namespace WindowsFormsApplication1
{
    partial class UserWindow
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(UserWindow));
            this.label1 = new System.Windows.Forms.Label();
            this.Weather = new System.Windows.Forms.Button();
            this.DayBefore = new System.Windows.Forms.Button();
            this.Calculator = new System.Windows.Forms.Button();
            this.button4 = new System.Windows.Forms.Button();
            this.button5 = new System.Windows.Forms.Button();
            this.button6 = new System.Windows.Forms.Button();
            this.button7 = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("Magneto", 26.25F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label1.Location = new System.Drawing.Point(12, 20);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(176, 44);
            this.label1.TabIndex = 0;
            this.label1.Text = "Hi Shai";
            // 
            // Weather
            // 
            this.Weather.Location = new System.Drawing.Point(36, 110);
            this.Weather.Name = "Weather";
            this.Weather.Size = new System.Drawing.Size(92, 34);
            this.Weather.TabIndex = 1;
            this.Weather.Text = "Weather";
            this.Weather.UseVisualStyleBackColor = true;
            // 
            // DayBefore
            // 
            this.DayBefore.Location = new System.Drawing.Point(232, 84);
            this.DayBefore.Name = "DayBefore";
            this.DayBefore.Size = new System.Drawing.Size(92, 34);
            this.DayBefore.TabIndex = 2;
            this.DayBefore.Text = "The day before";
            this.DayBefore.UseVisualStyleBackColor = true;
            // 
            // Calculator
            // 
            this.Calculator.Location = new System.Drawing.Point(136, 174);
            this.Calculator.Name = "Calculator";
            this.Calculator.Size = new System.Drawing.Size(92, 34);
            this.Calculator.TabIndex = 3;
            this.Calculator.Text = "Calculator";
            this.Calculator.UseVisualStyleBackColor = true;
            // 
            // button4
            // 
            this.button4.Location = new System.Drawing.Point(412, 120);
            this.button4.Name = "button4";
            this.button4.Size = new System.Drawing.Size(92, 34);
            this.button4.TabIndex = 4;
            this.button4.Text = "button4";
            this.button4.UseVisualStyleBackColor = true;
            // 
            // button5
            // 
            this.button5.Location = new System.Drawing.Point(322, 174);
            this.button5.Name = "button5";
            this.button5.Size = new System.Drawing.Size(92, 34);
            this.button5.TabIndex = 5;
            this.button5.Text = "button5";
            this.button5.UseVisualStyleBackColor = true;
            // 
            // button6
            // 
            this.button6.Location = new System.Drawing.Point(525, 84);
            this.button6.Name = "button6";
            this.button6.Size = new System.Drawing.Size(92, 34);
            this.button6.TabIndex = 6;
            this.button6.Text = "button6";
            this.button6.UseVisualStyleBackColor = true;
            // 
            // button7
            // 
            this.button7.Location = new System.Drawing.Point(613, 174);
            this.button7.Name = "button7";
            this.button7.Size = new System.Drawing.Size(92, 34);
            this.button7.TabIndex = 7;
            this.button7.Text = "button7";
            this.button7.UseVisualStyleBackColor = true;
            // 
            // UserWindow
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackgroundImage = ((System.Drawing.Image)(resources.GetObject("$this.BackgroundImage")));
            this.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Stretch;
            this.ClientSize = new System.Drawing.Size(727, 363);
            this.Controls.Add(this.button7);
            this.Controls.Add(this.button6);
            this.Controls.Add(this.button5);
            this.Controls.Add(this.button4);
            this.Controls.Add(this.Calculator);
            this.Controls.Add(this.DayBefore);
            this.Controls.Add(this.Weather);
            this.Controls.Add(this.label1);
            this.Name = "UserWindow";
            this.Text = "UserWindow";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Button Weather;
        private System.Windows.Forms.Button DayBefore;
        private System.Windows.Forms.Button Calculator;
        private System.Windows.Forms.Button button4;
        private System.Windows.Forms.Button button5;
        private System.Windows.Forms.Button button6;
        private System.Windows.Forms.Button button7;
    }
}