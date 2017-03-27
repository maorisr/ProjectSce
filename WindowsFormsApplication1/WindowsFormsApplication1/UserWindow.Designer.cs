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
            this.ClockB = new System.Windows.Forms.Button();
            this.ToDoB = new System.Windows.Forms.Button();
            this.AlbumB = new System.Windows.Forms.Button();
            this.Memo = new System.Windows.Forms.Button();
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
            this.Weather.Click += new System.EventHandler(this.Weather_Click);
            // 
            // DayBefore
            // 
            this.DayBefore.Location = new System.Drawing.Point(232, 84);
            this.DayBefore.Name = "DayBefore";
            this.DayBefore.Size = new System.Drawing.Size(92, 34);
            this.DayBefore.TabIndex = 2;
            this.DayBefore.Text = "The day before";
            this.DayBefore.UseVisualStyleBackColor = true;
            this.DayBefore.Click += new System.EventHandler(this.DayBefore_Click);
            // 
            // Calculator
            // 
            this.Calculator.Location = new System.Drawing.Point(136, 174);
            this.Calculator.Name = "Calculator";
            this.Calculator.Size = new System.Drawing.Size(92, 34);
            this.Calculator.TabIndex = 3;
            this.Calculator.Text = "Calculator";
            this.Calculator.UseVisualStyleBackColor = true;
            this.Calculator.Click += new System.EventHandler(this.Calculator_Click);
            // 
            // ClockB
            // 
            this.ClockB.Location = new System.Drawing.Point(412, 120);
            this.ClockB.Name = "ClockB";
            this.ClockB.Size = new System.Drawing.Size(92, 34);
            this.ClockB.TabIndex = 4;
            this.ClockB.Text = "World Clock";
            this.ClockB.UseVisualStyleBackColor = true;
            this.ClockB.Click += new System.EventHandler(this.ClockB_Click);
            // 
            // ToDoB
            // 
            this.ToDoB.Location = new System.Drawing.Point(322, 174);
            this.ToDoB.Name = "ToDoB";
            this.ToDoB.Size = new System.Drawing.Size(92, 34);
            this.ToDoB.TabIndex = 5;
            this.ToDoB.Text = "ToDo List";
            this.ToDoB.UseVisualStyleBackColor = true;
            this.ToDoB.Click += new System.EventHandler(this.button5_Click);
            // 
            // AlbumB
            // 
            this.AlbumB.Location = new System.Drawing.Point(525, 84);
            this.AlbumB.Name = "AlbumB";
            this.AlbumB.Size = new System.Drawing.Size(92, 34);
            this.AlbumB.TabIndex = 6;
            this.AlbumB.Text = "My Album";
            this.AlbumB.UseVisualStyleBackColor = true;
            this.AlbumB.Click += new System.EventHandler(this.AlbumB_Click);
            // 
            // Memo
            // 
            this.Memo.Location = new System.Drawing.Point(613, 174);
            this.Memo.Name = "Memo";
            this.Memo.Size = new System.Drawing.Size(92, 34);
            this.Memo.TabIndex = 7;
            this.Memo.Text = "Memo";
            this.Memo.UseVisualStyleBackColor = true;
            this.Memo.Click += new System.EventHandler(this.Memo_Click);
            // 
            // UserWindow
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackgroundImage = ((System.Drawing.Image)(resources.GetObject("$this.BackgroundImage")));
            this.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Stretch;
            this.ClientSize = new System.Drawing.Size(727, 363);
            this.Controls.Add(this.Memo);
            this.Controls.Add(this.AlbumB);
            this.Controls.Add(this.ToDoB);
            this.Controls.Add(this.ClockB);
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
        private System.Windows.Forms.Button ClockB;
        private System.Windows.Forms.Button ToDoB;
        private System.Windows.Forms.Button AlbumB;
        private System.Windows.Forms.Button Memo;
    }
}