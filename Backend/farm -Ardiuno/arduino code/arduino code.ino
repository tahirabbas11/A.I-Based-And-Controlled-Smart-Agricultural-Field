//lcd sensors
#include <LiquidCrystal_I2C.h>
LiquidCrystal_I2C lcd(0x27,16,2);
#include <dht.h>
dht DHT;
int status;


void setup() {
  lcd.init();
  lcd.clear();         
  lcd.backlight();      
  pinMode(2,OUTPUT);
  pinMode(3,OUTPUT);
  pinMode(4,OUTPUT);
  Serial.begin(9600);
  status=0;
  digitalWrite(2,1);
  digitalWrite(3,1);
  digitalWrite(4,1);

}

void loop() {
   char a = Serial.read();
   int values = analogRead(A2); 
   int valuel = analogRead(A1);
   int valuem = analogRead(A0); 
   DHT.read11(8);
   float valuet = DHT.temperature;
   float valueh = DHT.humidity;
   status=status+1;
   Serial.print("S");
   Serial.println(values);
   Serial.print("L");
   Serial.println(valuel);
   Serial.print("M");
   Serial.println(valuem);
   Serial.print("T");
   Serial.println(valuet);
   Serial.print("H");
   Serial.println(valueh);
   delay(100); 
   
   
  //smoke
  if(status==30){
   lcd.clear(); 
   lcd.setCursor(0,0);  
   lcd.print("Smoke:");
   lcd.setCursor(0,1);  
   lcd.print(values);
    }
    
  //ldr
   if(status==60){
   lcd.clear(); 
   lcd.setCursor(0,0);  
   lcd.print("LDR:");
   lcd.setCursor(0,1);  
   lcd.print(valuel);
   }
   
  //temperature
   if(status==90){
   lcd.clear(); 
   lcd.setCursor(0,0);  
   lcd.print("Termperature:");
   lcd.setCursor(0,1);  
   lcd.print(valuet); 
   }
   
  // humidity
   if(status==120){
   lcd.clear(); 
   lcd.setCursor(0,0);  
   lcd.print("Humidity:");
   lcd.setCursor(0,1);  
   lcd.print(valueh); 
}

  //Moisture 
   if(status==150){
   lcd.clear(); 
   lcd.setCursor(0,0);  
   lcd.print("Moisture:");
   lcd.setCursor(0,1);
   lcd.print(valuem);
   status=0;
   }

   //Pump On
    if(a=='z'){
      Serial.println("Pump On");
      digitalWrite(2,0);
      } 

   //Pump Off  
   if(a=='x'){
    Serial.println("Pump Off");
    digitalWrite(2,1);
   } 
  
  //Spray On
  if(a=='a'){
    Serial.println("Spray On");
    digitalWrite(3,0);
    }  
  //Spray Off  
   if(a=='s'){
    Serial.println("Spray Off");
    digitalWrite(3,1);
   } 
  
  //Fan On
  if(a=='q'){
    Serial.println("Fan On");
    digitalWrite(4,0);
    } 
  //Fan Off  
   if(a=='w'){
    Serial.println("Fan Off");
    digitalWrite(4,1);
   } 
 
}
