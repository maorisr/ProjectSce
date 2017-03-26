using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WindowsFormsApplication1
{
    public partial class Start : Form
    {
        public Start()
        {
            InitializeComponent();
        }

        private void UserT_TextChanged(object sender, EventArgs e)
        {

        }

        private void Login_Click(object sender, EventArgs e)
        {
            bool flag = false;
            string user, password;
            user = Convert.ToString(UserT.Text);
            password = Convert.ToString(PasswordT.Text);
            if (user=="shai")
            {
                if (password == "1111")
                    flag = true;
            }
            if (user == "dorlugasi")
            {
                if (password == "12345678")
                    flag = true;
            }
            if (user == "pini_gavriel")
            {
                if (password == "12345")
                    flag = true;
            }
            if (flag==true)
            {
                UserWindow userWin = new UserWindow();
                userWin.Show();
                this.Hide();
            }
            else
            {
                MessageBox.Show("check your password or user name");
            }
        }

        private void button1_Click(object sender, EventArgs e)
        {
        }
    }
}
