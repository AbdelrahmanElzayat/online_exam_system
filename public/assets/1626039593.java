package ffile;

import java.io.*;
import java.net.*;

public class Fileserver {

    public static void main(String[] args) throws Exception {
        
        ServerSocket s = new ServerSocket(4333); //for accept connection with client 
        
            Socket sr = s.accept();

            FileInputStream fr =new FileInputStream("F:\\file.txt");
            byte b[] =new byte[20002];
            fr.read(b,0,b.length);
            OutputStream os = sr.getOutputStream();
            os.write(b,0,b.length);

    }

}
