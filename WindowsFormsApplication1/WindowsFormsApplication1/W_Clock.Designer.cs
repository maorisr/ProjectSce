namespace WindowsFormsApplication1
{
    partial class W_Clock
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(W_Clock));
            this.button1 = new System.Windows.Forms.Button();
            this.C_Names = new System.Windows.Forms.ListBox();
            this.label1 = new System.Windows.Forms.Label();
            this.Time = new System.Windows.Forms.TextBox();
            this.Exit = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // button1
            // 
            this.button1.Location = new System.Drawing.Point(16, 78);
            this.button1.Name = "button1";
            this.button1.Size = new System.Drawing.Size(112, 46);
            this.button1.TabIndex = 0;
            this.button1.Text = "button1";
            this.button1.UseVisualStyleBackColor = true;
            // 
            // C_Names
            // 
            this.C_Names.Font = new System.Drawing.Font("Microsoft Sans Serif", 14.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.C_Names.FormattingEnabled = true;
            this.C_Names.ItemHeight = 24;
            this.C_Names.Items.AddRange(new object[] {
            "Israel",
            "Brazil",
            "Spain",
            "Italy",
            "Greece"});
            this.C_Names.Location = new System.Drawing.Point(181, 35);
            this.C_Names.Name = "C_Names";
            this.C_Names.Size = new System.Drawing.Size(120, 28);
            this.C_Names.TabIndex = 1;
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("Microsoft Sans Serif", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label1.Location = new System.Drawing.Point(12, 35);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(150, 24);
            this.label1.TabIndex = 2;
            this.label1.Text = "Choose county";
            // 
            // Time
            // 
            this.Time.BackColor = System.Drawing.SystemColors.InactiveCaption;
            this.Time.BorderStyle = System.Windows.Forms.BorderStyle.None;
            this.Time.Font = new System.Drawing.Font("Microsoft Sans Serif", 24F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Time.ForeColor = System.Drawing.SystemColors.Window;
            this.Time.Location = new System.Drawing.Point(134, 78);
            this.Time.Name = "Time";
            this.Time.Size = new System.Drawing.Size(132, 37);
            this.Time.TabIndex = 3;
            this.Time.WordWrap = false;
            // 
            // Exit
            // 
            this.Exit.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Exit.Location = new System.Drawing.Point(34, 184);
            this.Exit.Name = "Exit";
            this.Exit.Size = new System.Drawing.Size(94, 51);
            this.Exit.TabIndex = 4;
            this.Exit.Text = "EXIT";
            this.Exit.UseVisualStyleBackColor = true;
            this.Exit.Click += new System.EventHandler(this.Exit_Click);
            // 
            // W_Clock
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackgroundImage = ((System.Drawing.Image)(resources.GetObject("$this.BackgroundImage")));
            this.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Stretch;
            this.ClientSize = new System.Drawing.Size(486, 369);
            this.Controls.Add(this.Exit);
            this.Controls.Add(this.Time);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.C_Names);
            this.Controls.Add(this.button1);
            this.Name = "W_Clock";
            this.Text = "W_Clock";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button button1;
        private System.Windows.Forms.ListBox C_Names;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.TextBox Time;
        private System.Windows.Forms.Button Exit;
    }
}