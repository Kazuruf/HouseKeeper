using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data.Odbc;
using System.IO.Ports;
using MySql.Data.MySqlClient;



namespace Arduico
{
    public partial class Form1 : Form
    {
       

       static MySqlConnection connection; // static bcuz it will be used in the event handler
       
        private SerialPort arduiport;
       
        public Form1()
        {
            InitializeComponent();
            
        }

        private void button1_Click(object sender, EventArgs e)
        {
            
            string cs = textBox1.Text; //connection string 
                try
                {
                    connection = new MySqlConnection(cs);
                    connection.Open();  //opening the connection
                   
                }
                catch (MySql.Data.MySqlClient.MySqlException ex)
                {
                    MessageBox.Show(ex.Message);
                }
                finally
                {
                    button2.Enabled = true;
                    button4.Enabled = true;
                }
                
        }

       

        private void Form1_Load(object sender, EventArgs e)
        {
           var ports= SerialPort.GetPortNames();
           comboBox1.DataSource = ports;

    
        }
        // string MyConnection2 = "xxxxxxxxxx;user=xxxxxxx;database=xxxxxx;port=3306;password=mmmmmmm;";
        private void button3_Click(object sender, EventArgs e)
        {
         arduiport = new SerialPort(comboBox1.SelectedItem.ToString(), 9600); // port number + data rate in bits per sec
    
    
      arduiport.DataReceived += new SerialDataReceivedEventHandler(DataReceivedHandler);
      arduiport.Open();
            label3.Text = comboBox1.SelectedItem.ToString();
           
         
          
         
        }
        private static void DataReceivedHandler(object sender, SerialDataReceivedEventArgs e)
        {

            SerialPort sp = (SerialPort)sender; //Our main port

            try
            {
                string id = sp.ReadLine(); //reading the date from arduino (TAG ID)
               
                string Query = "select name from users where name='"+id+"'";
               
                MySqlCommand MyCommand = new MySqlCommand(Query, connection);
                MySqlDataReader MyReader;
               
                MyReader = MyCommand.ExecuteReader();     // Here our query will be executed
                if (MyReader.Read())
                {
                    if (id == MyReader.GetValue(0).ToString())
                    {// if the id matches 
                        MessageBox.Show("Access Granted ");
                        MyReader.Close();   // mandatory to close the data reader associated with the connexion before going any further 
                        sp.WriteLine("1"); // telling the arduino to open the door
                        var date =DateTime.Now;     // getting the time
                        string Queryinsert = "insert into log(id,name,date,hour) values('" + id + "','" + date.Date + "','" + date.Date + "','" + date.Hour + "');";
            
            MySqlCommand MyCommandinsert = new MySqlCommand(Query, connection);
         
            MyCommandinsert.ExecuteReader();     // Here our query will be executed and data saved into the database.
                        
           
        }
                }
               
                }

        catch (Exception ex)
        { 
            MessageBox.Show(ex.Message);
      }
            
     
}

        private void button2_Click(object sender, EventArgs e)
        {
            try
            {

                string Query = "select * from users ;";

                MySqlCommand MyCommand = new MySqlCommand(Query, connection);

                MySqlDataAdapter MyAdapter = new MySqlDataAdapter();
                MyAdapter.SelectCommand = MyCommand;
                DataTable dTable = new DataTable();
                MyAdapter.Fill(dTable);
                dataGridView1.DataSource = dTable; // here i have assigned a dTable object to the dataGridView1 object to display data.             

            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }
        
    }
}
