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
    public partial class Weather : Form
    {
        public Weather()
        {
            InitializeComponent();
        }

        private void Exit_Click(object sender, EventArgs e)
        {
            UserWindow user = new UserWindow();
            user.Show();
            this.Hide();
        }
    }
}
