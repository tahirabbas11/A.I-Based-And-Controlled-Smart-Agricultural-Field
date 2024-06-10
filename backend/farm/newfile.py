import tkinter as tk
import tkinter.font as tkFont
import serial
import mysql.connector
import time, requests
cnx = mysql.connector.connect(host="localhost",user="root",password="",database="laravel")
cursor = cnx.cursor()
ser = serial.Serial('COM4', 9600)
root = tk.Tk()
root.title("FYP PROJECT")
root.geometry("580x500")
mode=0
fo=0

def receive_data():
    global fo
    if ser.in_waiting > 0:
        data = ser.readline().decode('utf-8').strip()
        if len(data)>0:
            if data[0]=="H":
                GLabel_576["text"] = data[1:]
            if data[0]=="T":
                GLabel_983["text"] = data[1:]
            if data[0]=="S":
                GLabel_224["text"] = data[1:]
            if data[0]=="M":
                GLabel_887["text"] = data[1:]
            if data[0]=="L":
                GLabel_32["text"] = data[1:]
    if mode==1:
        if float(GLabel_983.cget("text")) > float(GLineEdit_489.get()) or float(GLabel_224.cget("text")) > float(GLineEdit_343.get()):
            if fo==0:
                GButton_196_command()
                fo=1
        else:
            if fo==1:
                GButton_581_command()
                fo=0

    query = "INSERT INTO sensors (humidity, temperature, smoke, moisture, light ) VALUES (%s, %s, %s, %s, %s)"
    values = (GLabel_576.cget("text"), GLabel_983.cget("text"), GLabel_224.cget("text"), GLabel_887.cget("text"), GLabel_32.cget("text"))  
    cursor.execute(query, values)
    cnx.commit()
    
    try:
        response = requests.get('http://127.0.0.1:5000/get-smoke')
        data = response.json()
        if(float(GLineEdit_343.get())!=float(data['smoke'])):
            GLineEdit_343.delete(0, 'end')  
            GLineEdit_343.insert(0, str(data['smoke']))  
   
    except:
        pass

    try:
        response = requests.get('http://127.0.0.1:5000/get-temp')
        data = response.json()
        if(float(GLineEdit_489.get())!=float(data['temp'])):
            GLineEdit_489.delete(0, 'end')  
            GLineEdit_489.insert(0, str(data['temp']))  
   
    except:
        pass

    try:
        response = requests.get('http://127.0.0.1:5000/auto')
        data = response.json()
        if(data['status'] == True):
            GButton_246_command()
        else:
            GButton_614_command()
    except:
        pass
    try:
        response = requests.get('http://127.0.0.1:5000/spary-on')
        data = response.json()
        if(data['status'] == True):
            GButton_14_command()
        else:
            GButton_69_command()
    except:
        pass
    try:
        response = requests.get('http://127.0.0.1:5000/pump-on')
        data = response.json()
        if(data['status'] == True):
            GButton_531_command()
        else:
            GButton_459_command()
    except:
        pass
    try:
        response = requests.get('http://127.0.0.1:5000/fan-on')
        data = response.json()
        if(data['status'] == True):
            GButton_196_command()
        else:
            GButton_581_command()
    except:
        pass


    root.after(100, receive_data)

def settempvalue(temp):
    GLineEdit_489.insert(0, str(temp)) 

def setmosvalue(temp):
    GLineEdit_224.insert(0, str(temp)) 

def setsmokevalue(temp):
    GLineEdit_343.insert(0, str(temp)) 

def GButton_246_command():
    global mode
    mode=1
    GLabel_95["text"] = "Automatic"
    GLabel_431["text"] = "Automatic Mode Set"

def GButton_614_command():
    global mode
    mode=0
    fo=0
    GButton_581_command()
    GButton_459_command
    GLabel_95["text"] = "Manual"
    GLabel_431["text"] = "Manual Mode Set"

def GButton_196_command():
    ser.write(b'q')
    GLabel_431["text"] = "Fan ON"
    GLabel_246["text"] = "ON"

def GButton_581_command():
    ser.write(b'w')
    GLabel_431["text"] = "Fan OFF"
    GLabel_246["text"] = "OFF"

def GButton_531_command():
    ser.write(b'z')
    GLabel_431["text"] = "Pump ON"
    GLabel_636["text"] = "ON"

def GButton_459_command():
    ser.write(b'x')
    GLabel_431["text"] = "Pump OFF"
    GLabel_636["text"] = "OFF"


def GButton_14_command():
    ser.write(b'a')
    GLabel_431["text"] = "Spray ON"
    GLabel_535["text"] = "ON"

def GButton_69_command():
    ser.write(b's')
    GLabel_431["text"] = "Spray OFF"
    GLabel_535["text"] = "OFF"


GLabel_924=tk.Label(root)
ft = tkFont.Font(family='Times',size=23)
GLabel_924["font"] = ft
GLabel_924["fg"] = "#ff0505"
GLabel_924["justify"] = "center"
GLabel_924["text"] = "FYP Project For Farm"
GLabel_924.place(x=140,y=10,width=279,height=30)

GLabel_677=tk.Label(root)
ft = tkFont.Font(family='Times',size=11)
GLabel_677["font"] = ft
GLabel_677["fg"] = "#0081ff"
GLabel_677["justify"] = "center"
GLabel_677["text"] = "Temperature : "
GLabel_677.place(x=10,y=60,width=89,height=30)

GLabel_373=tk.Label(root)
ft = tkFont.Font(family='Times',size=11)
GLabel_373["font"] = ft
GLabel_373["fg"] = "#0081ff"
GLabel_373["justify"] = "center"
GLabel_373["text"] = "Moisture : "
GLabel_373.place(x=10,y=80,width=66,height=30)

GLabel_908=tk.Label(root)
ft = tkFont.Font(family='Times',size=11)
GLabel_908["font"] = ft
GLabel_908["fg"] = "#0081ff"
GLabel_908["justify"] = "center"
GLabel_908["text"] = "Smoke : "
GLabel_908.place(x=0,y=100,width=71,height=30)

GLabel_85=tk.Label(root)
ft = tkFont.Font(family='Times',size=11)
GLabel_85["font"] = ft
GLabel_85["fg"] = "#0081ff"
GLabel_85["justify"] = "center"
GLabel_85["text"] = "Humidity : "
GLabel_85.place(x=0,y=120,width=83,height=30)

GLabel_229=tk.Label(root)
ft = tkFont.Font(family='Times',size=11)
GLabel_229["font"] = ft
GLabel_229["fg"] = "#0081ff"
GLabel_229["justify"] = "center"
GLabel_229["text"] = "Light : "
GLabel_229.place(x=0,y=140,width=62,height=30)

GLabel_297=tk.Label(root)
ft = tkFont.Font(family='Times',size=10)
GLabel_297["font"] = ft
GLabel_297["fg"] = "#1e90ff"
GLabel_297["justify"] = "center"
GLabel_297["text"] = "Auto mode : "
GLabel_297.place(x=40,y=200,width=91,height=30)

GLabel_576=tk.Label(root)
ft = tkFont.Font(family='Times',size=10)
GLabel_576["font"] = ft
GLabel_576["fg"] = "#333333"
GLabel_576["justify"] = "center"
GLabel_576["text"] = "hum"
GLabel_576.place(x=100,y=120,width=66,height=30)

GLabel_224=tk.Label(root)
ft = tkFont.Font(family='Times',size=10)
GLabel_224["font"] = ft
GLabel_224["fg"] = "#333333"
GLabel_224["justify"] = "center"
GLabel_224["text"] = "smo"
GLabel_224.place(x=110,y=100,width=49,height=30)

GLabel_32=tk.Label(root)
ft = tkFont.Font(family='Times',size=10)
GLabel_32["font"] = ft
GLabel_32["fg"] = "#333333"
GLabel_32["justify"] = "center"
GLabel_32["text"] = "ldr"
GLabel_32.place(x=100,y=140,width=66,height=30)

GLabel_887=tk.Label(root)
ft = tkFont.Font(family='Times',size=10)
GLabel_887["font"] = ft
GLabel_887["fg"] = "#333333"
GLabel_887["justify"] = "center"
GLabel_887["text"] = "moi"
GLabel_887.place(x=110,y=80,width=52,height=30)

GLabel_983=tk.Label(root)
ft = tkFont.Font(family='Times',size=10)
GLabel_983["font"] = ft
GLabel_983["fg"] = "#333333"
GLabel_983["justify"] = "center"
GLabel_983["text"] = "tem"
GLabel_983.place(x=100,y=60,width=70,height=30)

GLabel_95=tk.Label(root)
ft = tkFont.Font(family='Times',size=10)
GLabel_95["font"] = ft
GLabel_95["fg"] = "#333333"
GLabel_95["justify"] = "center"
GLabel_95["text"] = "Manual"
GLabel_95.place(x=130,y=200,width=70,height=31)

GButton_246=tk.Button(root)
GButton_246["bg"] = "#d7ffe2"
ft = tkFont.Font(family='Times',size=10)
GButton_246["font"] = ft
GButton_246["fg"] = "#000000"
GButton_246["justify"] = "center"
GButton_246["text"] = "On"
GButton_246.place(x=230,y=200,width=42,height=30)
GButton_246["command"] = GButton_246_command

GButton_614=tk.Button(root)
GButton_614["bg"] = "#d7ffe2"
ft = tkFont.Font(family='Times',size=10)
GButton_614["font"] = ft
GButton_614["fg"] = "#000000"
GButton_614["justify"] = "center"
GButton_614["text"] = "Off"
GButton_614.place(x=290,y=200,width=38,height=30)
GButton_614["command"] = GButton_614_command

GLabel_605=tk.Label(root)
ft = tkFont.Font(family='Times',size=10)
GLabel_605["font"] = ft
GLabel_605["fg"] = "#0980f4"
GLabel_605["justify"] = "center"
GLabel_605["text"] = "Fan"
GLabel_605.place(x=350,y=70,width=70,height=25)

GLabel_246=tk.Label(root)
ft = tkFont.Font(family='Times',size=10)
GLabel_246["font"] = ft
GLabel_246["fg"] = "#333333"
GLabel_246["justify"] = "center"
GLabel_246["text"] = "OFF"
GLabel_246.place(x=410,y=70,width=70,height=25)

GButton_196=tk.Button(root)
GButton_196["bg"] = "#d7ffe2"
ft = tkFont.Font(family='Times',size=10)
GButton_196["font"] = ft
GButton_196["fg"] = "#000000"
GButton_196["justify"] = "center"
GButton_196["text"] = "On"
GButton_196.place(x=480,y=70,width=32,height=30)
GButton_196["command"] = GButton_196_command

GButton_581=tk.Button(root)
GButton_581["bg"] = "#d7ffe2"
ft = tkFont.Font(family='Times',size=10)
GButton_581["font"] = ft
GButton_581["fg"] = "#000000"
GButton_581["justify"] = "center"
GButton_581["text"] = "Off"
GButton_581.place(x=520,y=70,width=30,height=30)
GButton_581["command"] = GButton_581_command

GLabel_821=tk.Label(root)
ft = tkFont.Font(family='Times',size=10)
GLabel_821["font"] = ft
GLabel_821["fg"] = "#0e82f2"
GLabel_821["justify"] = "center"
GLabel_821["text"] = "Pump"
GLabel_821.place(x=350,y=110,width=70,height=25)

GLabel_636=tk.Label(root)
ft = tkFont.Font(family='Times',size=10)
GLabel_636["font"] = ft
GLabel_636["fg"] = "#333333"
GLabel_636["justify"] = "center"
GLabel_636["text"] = "OFF"
GLabel_636.place(x=410,y=110,width=70,height=25)

GButton_531=tk.Button(root)
GButton_531["bg"] = "#d7ffe2"
ft = tkFont.Font(family='Times',size=10)
GButton_531["font"] = ft
GButton_531["fg"] = "#000000"
GButton_531["justify"] = "center"
GButton_531["text"] = "On"
GButton_531.place(x=480,y=110,width=31,height=30)
GButton_531["command"] = GButton_531_command

GButton_459=tk.Button(root)
GButton_459["bg"] = "#d7ffe2"
ft = tkFont.Font(family='Times',size=10)
GButton_459["font"] = ft
GButton_459["fg"] = "#000000"
GButton_459["justify"] = "center"
GButton_459["text"] = "Off"
GButton_459.place(x=520,y=110,width=30,height=30)
GButton_459["command"] = GButton_459_command

GLabel_258=tk.Label(root)
ft = tkFont.Font(family='Times',size=10)
GLabel_258["font"] = ft
GLabel_258["fg"] = "#1e90ff"
GLabel_258["justify"] = "center"
GLabel_258["text"] = "Temperature Range : "
GLabel_258.place(x=40,y=250,width=131,height=30)

GLabel_425=tk.Label(root)
ft = tkFont.Font(family='Times',size=10)
GLabel_425["font"] = ft
GLabel_425["fg"] = "#1e90ff"
GLabel_425["justify"] = "center"
GLabel_425["text"] = "Moisture Range :"
GLabel_425.place(x=30,y=290,width=125,height=30)


GLabel_393=tk.Label(root)
ft = tkFont.Font(family='Times',size=10)
GLabel_393["font"] = ft
GLabel_393["fg"] = "#1e90ff"
GLabel_393["justify"] = "center"
GLabel_393["text"] = "Smoke Range : "
GLabel_393.place(x=40,y=330,width=93,height=30)

GLabel_233=tk.Label(root)
ft = tkFont.Font(family='Times',size=10)
GLabel_233["font"] = ft
GLabel_233["fg"] = "#1e90ff"
GLabel_233["justify"] = "center"
GLabel_233["text"] = "Status :"
GLabel_233.place(x=50,y=450,width=70,height=25)

GLineEdit_489=tk.Entry(root)
GLineEdit_489["bg"] = "#fff6cb"
GLineEdit_489["borderwidth"] = "1px"
ft = tkFont.Font(family='Times',size=10)
GLineEdit_489["font"] = ft
GLineEdit_489["fg"] = "#333333"
GLineEdit_489["justify"] = "center"
GLineEdit_489.insert(0,"39")
GLineEdit_489.place(x=230,y=250,width=110,height=30)

GLineEdit_224=tk.Entry(root)
GLineEdit_224["bg"] = "#fff6cb"
GLineEdit_224["borderwidth"] = "1px"
ft = tkFont.Font(family='Times',size=10)
GLineEdit_224["font"] = ft
GLineEdit_224["fg"] = "#333333"
GLineEdit_224["justify"] = "center"
GLineEdit_224.insert(0,"990")
GLineEdit_224.place(x=230,y=290,width=111,height=30)


GLineEdit_343=tk.Entry(root)
GLineEdit_343["bg"] = "#fff6cb"
GLineEdit_343["borderwidth"] = "1px"
ft = tkFont.Font(family='Times',size=10)
GLineEdit_343["font"] = ft
GLineEdit_343["fg"] = "#333333"
GLineEdit_343["justify"] = "center"
GLineEdit_343.insert(0,"360")
GLineEdit_343.place(x=230,y=330,width=113,height=30)

GLabel_431=tk.Label(root)
ft = tkFont.Font(family='Times',size=10)
GLabel_431["font"] = ft
GLabel_431["fg"] = "#333333"
GLabel_431["justify"] = "center"
GLabel_431["text"] = "Arduino connected"
GLabel_431.place(x=160,y=450,width=279,height=30)

GLabel_943=tk.Label(root)
ft = tkFont.Font(family='Times',size=10)
GLabel_943["font"] = ft
GLabel_943["fg"] = "#0684ff"
GLabel_943["justify"] = "center"
GLabel_943["text"] = "Spray"
GLabel_943.place(x=350,y=150,width=70,height=25)

GLabel_535=tk.Label(root)
ft = tkFont.Font(family='Times',size=10)
GLabel_535["font"] = ft
GLabel_535["fg"] = "#333333"
GLabel_535["justify"] = "center"
GLabel_535["text"] = "OFF"
GLabel_535.place(x=410,y=150,width=70,height=25)

GButton_14=tk.Button(root)
GButton_14["bg"] = "#d7ffe2"
ft = tkFont.Font(family='Times',size=10)
GButton_14["font"] = ft
GButton_14["fg"] = "#000000"
GButton_14["justify"] = "center"
GButton_14["text"] = "On"
GButton_14.place(x=480,y=150,width=33,height=30)
GButton_14["command"] = GButton_14_command

GButton_69=tk.Button(root)
GButton_69["bg"] = "#d7ffe2"
ft = tkFont.Font(family='Times',size=10)
GButton_69["font"] = ft
GButton_69["fg"] = "#000000"
GButton_69["justify"] = "center"
GButton_69["text"] = "Off"
GButton_69.place(x=520,y=150,width=30,height=30)
GButton_69["command"] = GButton_69_command

receive_data()

root.mainloop()
ser.close()
#cursor.close()
#cnx.close()
