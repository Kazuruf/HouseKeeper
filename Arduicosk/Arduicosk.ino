#include <PN532.h>
#include <Servo.h>

#define SCK 13// declaration of the nfc shield IO
#define MOSI 11
#define SS 10
#define MISO 12

PN532 nfc(SCK, MISO, MOSI, SS);
Servo _lock;
void setup(void) {

 _lock.attach(9); 
    Serial.begin(9600);
   // Serial.println("Hello!");

    nfc.begin();

    uint32_t versiondata = nfc.getFirmwareVersion();
    if (! versiondata) {
        Serial.print("Didn't find PN53x board");
        while (1); // halt (infinite loop
    }

    nfc.SAMConfig();
}


uint32_t id=0;
int mydata;
void loop(void) {
    
    
    id = nfc.readPassiveTargetID(PN532_MIFARE_ISO14443A);
       if(id!=0)
       {
    Serial.print(id);
       Serial.print("\n");
    delay(500);
    id=0;
       }
       if (Serial.available() > 0) {
      mydata= Serial.read();
      if (mydata==1)
        _open_lock();
       }


}
void _open_lock()
{
  _lock.write(150); //rotates the lock 
  delay(5000);
   _lock.write(15);
}


