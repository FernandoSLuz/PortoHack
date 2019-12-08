using UnityEngine;
using System.Collections;
using System.IO;
using UnityEngine.Networking;
using System.Runtime.Serialization.Formatters.Binary;

public class ScreenShot : MonoBehaviour
{
    public int resWidth = 1080;
    public int resHeight = 720;
    public Camera camera;
    public Texture2D tex;
    private bool takeHiResShot = false;
    public GameObject panel;
    public static string ScreenShotName(int width, int height)
    {
        return string.Format("{0}/screenshots/screen_{1}x{2}_{3}.jpg",
                             Application.dataPath,
                             width, height,
                             System.DateTime.Now.ToString("yyyy-MM-dd_HH-mm-ss"));
    }

    public void TakeHiResShot()
    {
        takeHiResShot = true;
    }
    private void Start()
    {
        StartCoroutine(picRoutine());
    }
    public void enablePanels() {
        panel.SetActive(true);
    }
    public void startRecording() {
        StartCoroutine(picRoutine());
    }
    IEnumerator picRoutine()
    {
        while (true) {
            yield return new WaitForSeconds(5.0f);
            tex = new Texture2D(768, 432);
            takeHiResShot = false;
            RenderTexture rt = new RenderTexture(768, 432, 16);
            camera.targetTexture = rt;
            Texture2D screenShot = new Texture2D(768, 432, TextureFormat.RGB24, false);
            camera.Render();
            RenderTexture.active = rt;
            screenShot.ReadPixels(new Rect(0, 0, 768, 432), 0, 0);
            camera.targetTexture = null;
            RenderTexture.active = null; // JC: added to avoid errors
            Destroy(rt);
            byte[] bytes = screenShot.EncodeToJPG(75);
            tex.LoadImage(bytes);
            StartCoroutine(Upload(bytes));
        }
    }
    IEnumerator Upload(byte[] bytes)
    {
        WWWForm form = new WWWForm();
        form.AddField("id_Terminal", 1);
        form.AddField("id_User", 1);
        form.AddField("type", 1);
        form.AddField("status", 2);
        Debug.Log(System.Convert.ToBase64String(bytes));
        form.AddField("media", System.Convert.ToBase64String(bytes));
        form.AddField("description", "Ocorrência detectada");
        form.AddField("severity", "CATASTROFE");
        form.AddField("x", Random.Range(150, 400));
        form.AddField("y", Random.Range(150, 400));

        UnityWebRequest www = UnityWebRequest.Post("http://35.222.251.127/PortoHack/web_service/api/new_report.php", form);
        yield return www.SendWebRequest();

        if (www.isNetworkError || www.isHttpError)
        {
            Debug.Log(www.error);
        }
        else
        {
            Debug.Log(www.downloadHandler.text);
            if (www.downloadHandler.text == "ok") {
                enablePanels();
                StopAllCoroutines();
            }
        }
    }
}
