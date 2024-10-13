import serial
from firebase import firebase
import time
import datetime
#Linking firebase to my python code
FBConn = firebase.FirebaseApplication('https://computer-science-project-98b90-default-rtdb.firebaseio.com/',None)

#Setting up serial connection between pc and microbit
ser = serial.Serial()
ser.baudrate = 115200
ser.port = 'COM3'
ser.open()

#getting data from firebase about the on/off button
result = FBConn.get('/Data','Condition')
print(result)
off = "off$"

#checking if the alarm is turned on or off
while True:
    result = FBConn.get('/Data','Condition')
    if result == "on":
        data = str(ser.readline())
        data = str(ser.readline())
        data = data.replace("b","")
        data = data.replace("'","")
        data = data.replace(" ","")
        data = data.replace("\\r\\n","")
        print(data)
            
        #time stamp
        now = (datetime.datetime.today().strftime("%Y%m%d%H%M%S"))
        now = now[8:10] + ":" + now[10:12] + " " + now[6:8] + "/" + now[4:6] + "/" + now[2:4]

        x = "Door Opened"
        
        #if door is opened
        if "1" in data:
            data_to_upload = {
            'Status' : x,
            'Timestamp' : now
            }

            result = FBConn.post('MyMicrobit',data_to_upload)
            print(result)
    
    #if the alarm is off
    elif result == "off":
        print("Alarm off")
        #write "off$" to the usb
        ser.write(off.encode())
        
