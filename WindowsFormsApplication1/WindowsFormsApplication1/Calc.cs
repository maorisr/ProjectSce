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
    public partial class Calc : Form
    {
        Double res = 0;
        string operation = "";
        bool check_operation = false;
        public Calc()
        {
            InitializeComponent();
        }

        private void button3_Click(object sender, EventArgs e)
        {
            switch(operation)
            {
                case "+":
                    Result.Text = (res + Double.Parse(Result.Text)).ToString();
                    
                    break;
                case "*":
                    Result.Text = (res * Double.Parse(Result.Text)).ToString();
                    
                    break;
                case "/":
                    Result.Text = (res / Double.Parse(Result.Text)).ToString();
                    
                    break;
                case "-":
                    Result.Text = (res - Double.Parse(Result.Text)).ToString();
                    
                    break;
                default:
                    break;
            }
            res = Double.Parse(Result.Text);
            label1.Text = "";

        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {

        }

        private void textBox2_TextChanged(object sender, EventArgs e)
        {

        }

        private void Exit_Click(object sender, EventArgs e)
        {
            UserWindow user = new UserWindow();
            user.Show();
            this.Hide();
        }

        private void button2_Click(object sender, EventArgs e)
        {

        }

        private void Fir_Num_TextChanged(object sender, EventArgs e)
        {

        }

        private void button_click(object sender, EventArgs e)
        {
            if ((Result.Text == "0")||(check_operation))
                Result.Clear();
            Button button = (Button)sender;
            if (button.Text == ".")
            {
                if (!Result.Text.Contains("."))
                    Result.Text = Result.Text + button.Text;
            }else
            Result.Text = Result.Text + button.Text;
            check_operation = false;
        }

        private void Calc_Load(object sender, EventArgs e)
        {

        }

        private void Operator_click(object sender, EventArgs e)
        {
            Button button = (Button)sender;
            if (res != 0)
            {
                Equal_B.PerformClick();
                operation = button.Text;
                label1.Text = res + " " + operation;
                check_operation = true;

            }
            else
            {

                operation = button.Text;
                res = Double.Parse(Result.Text);
                label1.Text = res + " " + operation;
                check_operation = true;
            }
        }


        private void CE_Click(object sender, EventArgs e)
        {
            Result.Text = "0";
            res = 0;
        }

        private void label1_Click(object sender, EventArgs e)
        {

        }
    }
}
