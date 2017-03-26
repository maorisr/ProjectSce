namespace WindowsFormsApplication1
{
    partial class Start
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(Start));
            this.Login = new System.Windows.Forms.Button();
            this.label1 = new System.Windows.Forms.Label();
            this.User = new System.Windows.Forms.Label();
            this.label3 = new System.Windows.Forms.Label();
            this.UserT = new System.Windows.Forms.TextBox();
            this.label2 = new System.Windows.Forms.Label();
            this.PasswordT = new System.Windows.Forms.TextBox();
            this.SuspendLayout();
            // 
            // Login
            // 
            this.Login.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Login.Location = new System.Drawing.Point(280, 248);
            this.Login.Name = "Login";
            this.Login.Size = new System.Drawing.Size(255, 46);
            this.Login.TabIndex = 0;
            this.Login.Text = "LOGIN";
            this.Login.UseVisualStyleBackColor = true;
            this.Login.Click += new System.EventHandler(this.Login_Click);
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("Jokerman", 36F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label1.Location = new System.Drawing.Point(72, 28);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(572, 70);
            this.label1.TabIndex = 1;
            this.label1.Text = "Welcome to WeedJet ";
            // 
            // User
            // 
            this.User.AutoSize = true;
            this.User.Font = new System.Drawing.Font("Microsoft Sans Serif", 20.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.User.Location = new System.Drawing.Point(69, 136);
            this.User.Name = "User";
            this.User.Size = new System.Drawing.Size(175, 31);
            this.User.TabIndex = 2;
            this.User.Text = "USER NAME";
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Font = new System.Drawing.Font("Microsoft Sans Serif", 20.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label3.Location = new System.Drawing.Point(69, 187);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(172, 31);
            this.label3.TabIndex = 3;
            this.label3.Text = "PASSWORD";
            // 
            // UserT
            // 
            this.UserT.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.UserT.Location = new System.Drawing.Point(263, 136);
            this.UserT.Name = "UserT";
            this.UserT.Size = new System.Drawing.Size(272, 31);
            this.UserT.TabIndex = 4;
            this.UserT.Text = "Enter user name";
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(332, 171);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(0, 13);
            this.label2.TabIndex = 5;
            // 
            // PasswordT
            // 
            this.PasswordT.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.PasswordT.Location = new System.Drawing.Point(263, 187);
            this.PasswordT.Name = "PasswordT";
            this.PasswordT.Size = new System.Drawing.Size(272, 31);
            this.PasswordT.TabIndex = 6;
            this.PasswordT.Text = "Enter password";
            this.PasswordT.TextChanged += new System.EventHandler(this.UserT_TextChanged);
            // 
            // Start
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackgroundImage = ((System.Drawing.Image)(resources.GetObject("$this.BackgroundImage")));
            this.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Stretch;
            this.ClientSize = new System.Drawing.Size(698, 354);
            this.Controls.Add(this.PasswordT);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.UserT);
            this.Controls.Add(this.label3);
            this.Controls.Add(this.User);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.Login);
            this.Name = "Start";
            this.Text = "START";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button Login;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label User;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.TextBox UserT;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.TextBox PasswordT;
    }
}

