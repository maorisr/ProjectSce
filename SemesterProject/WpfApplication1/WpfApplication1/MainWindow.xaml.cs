using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.IO;
using System.Windows;
using System.Net;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;
using System.Diagnostics;
using Newtonsoft.Json;
using System.Collections.Specialized;
using System.Web.Script.Serialization;

namespace WpfApplication1
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        WebClient client = new WebClient();
        public MainWindow()
        {
            InitializeComponent();
        }

        private void button_Click(object sender, EventArgs e)
        {
            {
                // Create a request using a URL that can receive a post.   
                WebRequest request = WebRequest.Create("http://localhost:8080/");
                // Set the Method property of the request to POST.  
                request.Method = "POST";
                // Create POST data and convert it to a byte array.  


                string postData = new JavaScriptSerializer().Serialize(new
                {
                    user = "dor",
                    password = "1234"
                });
                
                byte[] byteArray = Encoding.UTF8.GetBytes(postData);
                // Set the ContentType property of the WebRequest.  
                request.ContentType = "application/x-www-form-urlencoded";
                // Set the ContentLength property of the WebRequest.  
                request.ContentLength = byteArray.Length;
                // Get the request stream.  
                Stream dataStream = request.GetRequestStream();
                // Write the data to the request stream.  
                dataStream.Write(byteArray, 0, byteArray.Length);
                // Close the Stream object.  
                dataStream.Close();
                // Get the response.  
                WebResponse response = request.GetResponse();
                // Display the status.  
                Console.WriteLine(((HttpWebResponse)response).StatusDescription);
                // Get the stream containing content returned by the server.  
                dataStream = response.GetResponseStream();
                // Open the stream using a StreamReader for easy access.  
                StreamReader reader = new StreamReader(dataStream);
                // Read the content.  
                string responseFromServer = reader.ReadToEnd();
                // Display the content.  
                Console.WriteLine(responseFromServer);
                // Clean up the streams.  
                reader.Close();
                dataStream.Close();
                response.Close();
            }
        }

    }
}














    /* 
            //  //GET from php echo
            var request = WebRequest.Create("http://localhost:8080/SemesterProject/");
            string text;
            var response = (HttpWebResponse)request.GetResponse();
            request.ContentType = "application/json; charset=utf-8";

            using (var sr = new StreamReader(response.GetResponseStream()))
            {
                text = sr.ReadToEnd();
                Console.WriteLine(text);    
            }
            


    var httpWebRequest = (HttpWebRequest)WebRequest.Create("http://localhost:8080/SemesterProject/index.php");
    httpWebRequest.ContentType = "application/json";
            httpWebRequest.Method = "POST";

            using (var streamWriter = new StreamWriter(httpWebRequest.GetRequestStream()))
            {
                string json = new JavaScriptSerializer().Serialize(new
                {
                    user = "Foo",
                    password = "Baz"
                });

    streamWriter.Write(json);
                Console.WriteLine("Console.WriteLine(json);");
                Console.WriteLine(json);

            }


var httpResponse = (HttpWebResponse)httpWebRequest.GetResponse();
            using (var streamReader = new StreamReader(httpResponse.GetResponseStream()))
            {
                var result = streamReader.ReadToEnd();
Console.WriteLine("Console.WriteLine(result);");
                Console.WriteLine(result);

            }




            //NameValueCollection userinfo = new NameValueCollection();
            //userinfo.Add("username", user.Text);
            ////string json = new JavaScriptSerializer().Serialize(userinfo);
            //byte[] InsertUser = client.UploadValues("http://localhost:8080/SemesterProject/index.php","POST",userinfo);
        }

    */