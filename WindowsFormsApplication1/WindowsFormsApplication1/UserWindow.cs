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
    public partial class UserWindow : Form
    {
        public UserWindow()
        {
            InitializeComponent();
        }

        private void button5_Click(object sender, EventArgs e)
        {
            TodoL TodoList = new TodoL();
            TodoList.Show();
            this.Hide();
        }

        private void Memo_Click(object sender, EventArgs e)
        {
            Memo memo = new Memo();
            memo.Show();
            this.Hide();
        }

        private void ClockB_Click(object sender, EventArgs e)
        {
            W_Clock clock = new W_Clock();
            clock.Show();
            this.Hide();
        }

        private void Calculator_Click(object sender, EventArgs e)
        {
            Calc calc = new Calc();
            calc.Show();
            this.Hide();
        }

        private void Weather_Click(object sender, EventArgs e)
        {
            Weather weather = new Weather();
            weather.Show();
            this.Hide();
        }

        private void DayBefore_Click(object sender, EventArgs e)
        {
            The_Day_B the_day = new The_Day_B();
            the_day.Show();
            this.Hide();
        }

        private void AlbumB_Click(object sender, EventArgs e)
        {
            Album my_album = new Album();
            my_album.Show();
            this.Hide();
        }
    }
}
