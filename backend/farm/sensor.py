import tkinter as tk
import tkinter.font as tkFont
import serial
import time
import json 


class Sensor:
    def __init__(self) -> None:
        self.ser = serial.Serial('COM4', 9600)
        self.mode = 1
        self.fo = 0
        self.tempset = 30
        self.moisture_range = 990
        self.smokerange = 360
    def recieveData(self):
        humidity, temperature, smoke, moisture, light = 0, 0, 0, 0, 0

        if self.ser.in_waiting > 0:
            data = self.ser.readline().decode('utf-8').strip()
            if len(data) > 0:
                if data[0] == "H":
                    humidity = data[1:]
                elif data[0] == "T":
                    temperature = data[1:]
                elif data[0] == "S":
                    smoke = data[1:]
                elif data[0] == "M":
                    moisture = data[1:]
                elif data[0] == "L":
                    light = data[1:]
        if self.mode==1:
            if float(temperature) > float(self.tempset.get()) or float(smoke) > float(self.smokerange):
                if self.fo==0:
                    self.GButton_196_command()
                    self.fo=1
            else:
                if self.fo==1:
                    self.GButton_581_command()
                    self.fo=0
        # Rest of your code...

        # return json.dumps({
        #     "humidity": humidity,
        #     "temperature": temperature,
        #     "smoke": smoke,
        #     "moisture": moisture,
        #     "light": light
        # }, indent=4)
        print({
                "humidity": humidity,
                "temperature": temperature,
                "smoke": smoke,
                "moisture": moisture,
                "light": light
            })
        time.sleep(100)
        self.recieveData()
    def GButton_196_command(self):
        self.ser.write(b'q')
        # GLabel_431["text"] = "Fan ON"
        # GLabel_246["text"] = "ON"
    def GButton_581_command(self):
        self.ser.write(b'w')
        # GLabel_431["text"] = "Fan OFF"
        # GLabel_246["text"] = "OFF"
    def close(self):
        self.ser.close()