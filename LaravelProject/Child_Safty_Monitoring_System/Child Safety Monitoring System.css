#include "FirebaseESP8266.h"
#include <ESP8266WiFi.h>
#include <TinyGPS++.h>

#define FIREBASE_HOST "womensafety-64980-default-rtdb.firebaseio.com"  
#define FIREBASE_AUTH "As0OHaC75W1Bb2ykiixenIWZRrggDX6NolWUBYLV"

#define WIFI_SSID "Women Safety"     
#define WIFI_PASSWORD "12345678" 


FirebaseData firebaseData;
FirebaseJson json;

double lattitude,longitude;
TinyGPSPlus gps;



void setup() {
  
  pinMode(A0,INPUT);
  pinMode(D4,OUTPUT);
  Serial.begin(9600);
  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
  
  while (WiFi.status() != WL_CONNECTED)
  {
  digitalWrite(D4,0);
    delay(200);
    digitalWrite(D4,1);
    delay(200);

    Serial.println(analogRead(A0));
    
  }

  Firebase.begin(FIREBASE_HOST, FIREBASE_AUTH);
  Firebase.reconnectWiFi(true);

}

void loop() {
  
   while(Serial.available())
  {
    gps.encode(Serial.read());  
  }
  if(gps.location.isUpdated())  
  {
    digitalWrite(D4,0);
   
    lattitude=gps.location.lat();
    longitude=gps.location.lng();

    Firebase.setString(firebaseData, "/Location/Lat",String(lattitude,6) );
    delay(100);
    Firebase.setString(firebaseData, "/Location/Lon",String(longitude,6) );
    delay(100);
    digitalWrite(D4,1);

  }

  Serial.println("Location: "+String(lattitude,6)+", "+String(longitude,6)+"  Gas: "+analogRead(A0));

  Firebase.setString(firebaseData, "/Danger",String(analogRead(A0)>700));
  delay(300);

}