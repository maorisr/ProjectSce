namespace WindowsFormsApplication1
{
    partial class Calc
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(Calc));
            this.Exit = new System.Windows.Forms.Button();
            this.Equal_B = new System.Windows.Forms.Button();
            this.Div_B = new System.Windows.Forms.Button();
            this.Sub_B = new System.Windows.Forms.Button();
            this.Add_B = new System.Windows.Forms.Button();
            this.Mul_B = new System.Windows.Forms.Button();
            this.Result = new System.Windows.Forms.TextBox();
            this.Num_9 = new System.Windows.Forms.Button();
            this.Num_8 = new System.Windows.Forms.Button();
            this.Num_7 = new System.Windows.Forms.Button();
            this.Num_6 = new System.Windows.Forms.Button();
            this.Num_5 = new System.Windows.Forms.Button();
            this.Num_4 = new System.Windows.Forms.Button();
            this.Num_3 = new System.Windows.Forms.Button();
            this.Num_2 = new System.Windows.Forms.Button();
            this.Num_1 = new System.Windows.Forms.Button();
            this.Num_0 = new System.Windows.Forms.Button();
            this.CE = new System.Windows.Forms.Button();
            this.label1 = new System.Windows.Forms.Label();
            this.Num_point = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // Exit
            // 
            this.Exit.Location = new System.Drawing.Point(297, 12);
            this.Exit.Name = "Exit";
            this.Exit.Size = new System.Drawing.Size(100, 29);
            this.Exit.TabIndex = 1;
            this.Exit.Text = "EXIT";
            this.Exit.UseVisualStyleBackColor = true;
            this.Exit.Click += new System.EventHandler(this.Exit_Click);
            // 
            // Equal_B
            // 
            this.Equal_B.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Equal_B.Location = new System.Drawing.Point(297, 245);
            this.Equal_B.Name = "Equal_B";
            this.Equal_B.Size = new System.Drawing.Size(62, 81);
            this.Equal_B.TabIndex = 2;
            this.Equal_B.Text = "=";
            this.Equal_B.UseVisualStyleBackColor = true;
            this.Equal_B.Click += new System.EventHandler(this.button3_Click);
            // 
            // Div_B
            // 
            this.Div_B.Font = new System.Drawing.Font("Microsoft Sans Serif", 11.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Div_B.Location = new System.Drawing.Point(217, 120);
            this.Div_B.Name = "Div_B";
            this.Div_B.Size = new System.Drawing.Size(33, 31);
            this.Div_B.TabIndex = 3;
            this.Div_B.Text = "/";
            this.Div_B.UseVisualStyleBackColor = true;
            this.Div_B.Click += new System.EventHandler(this.Operator_click);
            // 
            // Sub_B
            // 
            this.Sub_B.Font = new System.Drawing.Font("Microsoft Sans Serif", 20.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Sub_B.Location = new System.Drawing.Point(218, 297);
            this.Sub_B.Name = "Sub_B";
            this.Sub_B.Size = new System.Drawing.Size(33, 29);
            this.Sub_B.TabIndex = 4;
            this.Sub_B.Text = "-";
            this.Sub_B.UseVisualStyleBackColor = true;
            this.Sub_B.Click += new System.EventHandler(this.Operator_click);
            // 
            // Add_B
            // 
            this.Add_B.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Add_B.Location = new System.Drawing.Point(217, 242);
            this.Add_B.Name = "Add_B";
            this.Add_B.Size = new System.Drawing.Size(34, 33);
            this.Add_B.TabIndex = 5;
            this.Add_B.Text = "+";
            this.Add_B.UseVisualStyleBackColor = true;
            this.Add_B.Click += new System.EventHandler(this.Operator_click);
            // 
            // Mul_B
            // 
            this.Mul_B.Font = new System.Drawing.Font("Microsoft Sans Serif", 20.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Mul_B.Location = new System.Drawing.Point(216, 184);
            this.Mul_B.Name = "Mul_B";
            this.Mul_B.Size = new System.Drawing.Size(34, 33);
            this.Mul_B.TabIndex = 6;
            this.Mul_B.Text = "*";
            this.Mul_B.UseVisualStyleBackColor = true;
            this.Mul_B.Click += new System.EventHandler(this.Operator_click);
            // 
            // Result
            // 
            this.Result.Location = new System.Drawing.Point(12, 37);
            this.Result.Name = "Result";
            this.Result.Size = new System.Drawing.Size(239, 20);
            this.Result.TabIndex = 11;
            this.Result.Text = "0";
            this.Result.TextChanged += new System.EventHandler(this.Fir_Num_TextChanged);
            // 
            // Num_9
            // 
            this.Num_9.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Num_9.Location = new System.Drawing.Point(140, 121);
            this.Num_9.Name = "Num_9";
            this.Num_9.Size = new System.Drawing.Size(36, 30);
            this.Num_9.TabIndex = 12;
            this.Num_9.Text = "9";
            this.Num_9.UseVisualStyleBackColor = true;
            this.Num_9.Click += new System.EventHandler(this.button_click);
            // 
            // Num_8
            // 
            this.Num_8.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Num_8.Location = new System.Drawing.Point(70, 121);
            this.Num_8.Name = "Num_8";
            this.Num_8.Size = new System.Drawing.Size(36, 30);
            this.Num_8.TabIndex = 13;
            this.Num_8.Text = "8";
            this.Num_8.UseVisualStyleBackColor = true;
            this.Num_8.Click += new System.EventHandler(this.button_click);
            // 
            // Num_7
            // 
            this.Num_7.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Num_7.Location = new System.Drawing.Point(12, 121);
            this.Num_7.Name = "Num_7";
            this.Num_7.Size = new System.Drawing.Size(36, 30);
            this.Num_7.TabIndex = 14;
            this.Num_7.Text = "7";
            this.Num_7.UseVisualStyleBackColor = true;
            this.Num_7.Click += new System.EventHandler(this.button_click);
            // 
            // Num_6
            // 
            this.Num_6.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Num_6.Location = new System.Drawing.Point(140, 187);
            this.Num_6.Name = "Num_6";
            this.Num_6.Size = new System.Drawing.Size(36, 30);
            this.Num_6.TabIndex = 15;
            this.Num_6.Text = "6";
            this.Num_6.UseVisualStyleBackColor = true;
            this.Num_6.Click += new System.EventHandler(this.button_click);
            // 
            // Num_5
            // 
            this.Num_5.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Num_5.Location = new System.Drawing.Point(70, 187);
            this.Num_5.Name = "Num_5";
            this.Num_5.Size = new System.Drawing.Size(36, 30);
            this.Num_5.TabIndex = 16;
            this.Num_5.Text = "5";
            this.Num_5.UseVisualStyleBackColor = true;
            this.Num_5.Click += new System.EventHandler(this.button_click);
            // 
            // Num_4
            // 
            this.Num_4.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Num_4.Location = new System.Drawing.Point(12, 187);
            this.Num_4.Name = "Num_4";
            this.Num_4.Size = new System.Drawing.Size(36, 30);
            this.Num_4.TabIndex = 17;
            this.Num_4.Text = "4";
            this.Num_4.UseVisualStyleBackColor = true;
            this.Num_4.Click += new System.EventHandler(this.button_click);
            // 
            // Num_3
            // 
            this.Num_3.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Num_3.Location = new System.Drawing.Point(140, 245);
            this.Num_3.Name = "Num_3";
            this.Num_3.Size = new System.Drawing.Size(36, 30);
            this.Num_3.TabIndex = 18;
            this.Num_3.Text = "3";
            this.Num_3.UseVisualStyleBackColor = true;
            this.Num_3.Click += new System.EventHandler(this.button_click);
            // 
            // Num_2
            // 
            this.Num_2.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Num_2.Location = new System.Drawing.Point(70, 245);
            this.Num_2.Name = "Num_2";
            this.Num_2.Size = new System.Drawing.Size(36, 30);
            this.Num_2.TabIndex = 19;
            this.Num_2.Text = "2";
            this.Num_2.UseVisualStyleBackColor = true;
            this.Num_2.Click += new System.EventHandler(this.button_click);
            // 
            // Num_1
            // 
            this.Num_1.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Num_1.Location = new System.Drawing.Point(12, 245);
            this.Num_1.Name = "Num_1";
            this.Num_1.Size = new System.Drawing.Size(36, 30);
            this.Num_1.TabIndex = 20;
            this.Num_1.Text = "1";
            this.Num_1.UseVisualStyleBackColor = true;
            this.Num_1.Click += new System.EventHandler(this.button_click);
            // 
            // Num_0
            // 
            this.Num_0.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Num_0.Location = new System.Drawing.Point(12, 299);
            this.Num_0.Name = "Num_0";
            this.Num_0.Size = new System.Drawing.Size(110, 30);
            this.Num_0.TabIndex = 21;
            this.Num_0.Text = "0";
            this.Num_0.UseVisualStyleBackColor = true;
            this.Num_0.Click += new System.EventHandler(this.button_click);
            // 
            // CE
            // 
            this.CE.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.CE.Location = new System.Drawing.Point(297, 121);
            this.CE.Name = "CE";
            this.CE.Size = new System.Drawing.Size(62, 96);
            this.CE.TabIndex = 22;
            this.CE.Text = "CE";
            this.CE.UseVisualStyleBackColor = true;
            this.CE.Click += new System.EventHandler(this.CE_Click);
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label1.Location = new System.Drawing.Point(12, 9);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(119, 25);
            this.label1.TabIndex = 24;
            this.label1.Text = "Calculator";
            this.label1.Click += new System.EventHandler(this.label1_Click);
            // 
            // Num_point
            // 
            this.Num_point.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Num_point.Location = new System.Drawing.Point(140, 296);
            this.Num_point.Name = "Num_point";
            this.Num_point.Size = new System.Drawing.Size(36, 30);
            this.Num_point.TabIndex = 25;
            this.Num_point.Text = ".";
            this.Num_point.UseVisualStyleBackColor = true;
            this.Num_point.Click += new System.EventHandler(this.button_click);
            // 
            // Calc
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackgroundImage = ((System.Drawing.Image)(resources.GetObject("$this.BackgroundImage")));
            this.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Stretch;
            this.ClientSize = new System.Drawing.Size(409, 341);
            this.Controls.Add(this.Num_point);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.CE);
            this.Controls.Add(this.Num_0);
            this.Controls.Add(this.Num_1);
            this.Controls.Add(this.Num_2);
            this.Controls.Add(this.Num_3);
            this.Controls.Add(this.Num_4);
            this.Controls.Add(this.Num_5);
            this.Controls.Add(this.Num_6);
            this.Controls.Add(this.Num_7);
            this.Controls.Add(this.Num_8);
            this.Controls.Add(this.Num_9);
            this.Controls.Add(this.Result);
            this.Controls.Add(this.Mul_B);
            this.Controls.Add(this.Add_B);
            this.Controls.Add(this.Sub_B);
            this.Controls.Add(this.Div_B);
            this.Controls.Add(this.Equal_B);
            this.Controls.Add(this.Exit);
            this.Name = "Calc";
            this.Text = "Calc";
            this.Load += new System.EventHandler(this.Calc_Load);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button Exit;
        private System.Windows.Forms.Button Equal_B;
        private System.Windows.Forms.Button Div_B;
        private System.Windows.Forms.Button Sub_B;
        private System.Windows.Forms.Button Add_B;
        private System.Windows.Forms.Button Mul_B;
        private System.Windows.Forms.TextBox Result;
        private System.Windows.Forms.Button Num_9;
        private System.Windows.Forms.Button Num_8;
        private System.Windows.Forms.Button Num_7;
        private System.Windows.Forms.Button Num_6;
        private System.Windows.Forms.Button Num_5;
        private System.Windows.Forms.Button Num_4;
        private System.Windows.Forms.Button Num_3;
        private System.Windows.Forms.Button Num_2;
        private System.Windows.Forms.Button Num_1;
        private System.Windows.Forms.Button Num_0;
        private System.Windows.Forms.Button CE;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Button Num_point;
    }
}