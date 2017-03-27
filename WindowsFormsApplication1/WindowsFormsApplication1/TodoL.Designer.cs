namespace WindowsFormsApplication1
{
    partial class TodoL
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(TodoL));
            this.checkedListBox1 = new System.Windows.Forms.CheckedListBox();
            this.New_Task = new System.Windows.Forms.Button();
            this.All_Tasks = new System.Windows.Forms.Button();
            this.EXIT = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // checkedListBox1
            // 
            this.checkedListBox1.FormattingEnabled = true;
            this.checkedListBox1.Items.AddRange(new object[] {
            "HomeWork",
            "Work",
            "Walk with the dog",
            "Eat burger"});
            this.checkedListBox1.Location = new System.Drawing.Point(12, 231);
            this.checkedListBox1.Name = "checkedListBox1";
            this.checkedListBox1.Size = new System.Drawing.Size(124, 34);
            this.checkedListBox1.TabIndex = 0;
            // 
            // New_Task
            // 
            this.New_Task.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.New_Task.Location = new System.Drawing.Point(12, 98);
            this.New_Task.Name = "New_Task";
            this.New_Task.Size = new System.Drawing.Size(99, 48);
            this.New_Task.TabIndex = 1;
            this.New_Task.Text = "New Task";
            this.New_Task.UseVisualStyleBackColor = true;
            // 
            // All_Tasks
            // 
            this.All_Tasks.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.All_Tasks.Location = new System.Drawing.Point(354, 98);
            this.All_Tasks.Name = "All_Tasks";
            this.All_Tasks.Size = new System.Drawing.Size(101, 50);
            this.All_Tasks.TabIndex = 2;
            this.All_Tasks.Text = "All tasks";
            this.All_Tasks.UseVisualStyleBackColor = true;
            // 
            // EXIT
            // 
            this.EXIT.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.EXIT.Location = new System.Drawing.Point(354, 202);
            this.EXIT.Name = "EXIT";
            this.EXIT.Size = new System.Drawing.Size(98, 43);
            this.EXIT.TabIndex = 3;
            this.EXIT.Text = "EXIT";
            this.EXIT.UseVisualStyleBackColor = true;
            this.EXIT.Click += new System.EventHandler(this.EXIT_Click);
            // 
            // TodoL
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackgroundImage = ((System.Drawing.Image)(resources.GetObject("$this.BackgroundImage")));
            this.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Stretch;
            this.ClientSize = new System.Drawing.Size(467, 352);
            this.Controls.Add(this.EXIT);
            this.Controls.Add(this.All_Tasks);
            this.Controls.Add(this.New_Task);
            this.Controls.Add(this.checkedListBox1);
            this.Name = "TodoL";
            this.Text = "TodoL";
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.CheckedListBox checkedListBox1;
        private System.Windows.Forms.Button New_Task;
        private System.Windows.Forms.Button All_Tasks;
        private System.Windows.Forms.Button EXIT;
    }
}