int pinMotor1 = 6;
int pinMotor2 = 7;
int pinMotor3 = 8;
int pinMotor4 = 9;
int pinMotor5 = 10;
int pinMotor6 = 11;
int pinMotor7 = 12;
int pinMotor8 = 13;

int pinSwitch1 = 2;
int pinSwitch2 = 3;
int pinSwitch3 = 4;
int pinSwitch4 = 5;

int readSwitch1 = 0;
int readSwitch2 = 0;
int readSwitch3 = 0;
int readSwitch4 = 0;

// 0 = unlocked, 1 = locked
int doorStatus1 = 0;
int doorStatus2 = 0;
int doorStatus3 = 0;
int doorStatus4 = 0;

void setup() {
  // put your setup code here, to run once:
  pinMode(pinSwitch1, INPUT_PULLUP);
  pinMode(pinSwitch2, INPUT_PULLUP);
  pinMode(pinSwitch3, INPUT_PULLUP);
  pinMode(pinSwitch4, INPUT_PULLUP);

  pinMode(pinMotor1, OUTPUT);
  pinMode(pinMotor2, OUTPUT);
  pinMode(pinMotor3, OUTPUT);
  pinMode(pinMotor4, OUTPUT);
  pinMode(pinMotor5, OUTPUT);
  pinMode(pinMotor6, OUTPUT);
  pinMode(pinMotor7, OUTPUT);
  pinMode(pinMotor8, OUTPUT);
}

void loop() {
  // put your main code here, to run repeatedly:
  readSwitch1 = digitalRead(pinSwitch1);
  readSwitch2 = digitalRead(pinSwitch2);
  readSwitch3 = digitalRead(pinSwitch3);
  readSwitch4 = digitalRead(pinSwitch4);

  // Door 1
  if (readSwitch1 == HIGH && doorStatus1 == 1) {
    digitalWrite(pinMotor1, HIGH);
    digitalWrite(pinMotor2, LOW);
    delay(2000);
    digitalWrite(pinMotor2, HIGH);

    doorStatus1 = 0;
  } else if (readSwitch1 == LOW && doorStatus1 == 0) {
    digitalWrite(pinMotor1, LOW);
    digitalWrite(pinMotor2, HIGH);
    delay(2000);
    digitalWrite(pinMotor1, HIGH);

    doorStatus1 = 1;
  }

  // Door 2
  if (readSwitch2 == HIGH && doorStatus2 == 1) {
    digitalWrite(pinMotor3, HIGH);
    digitalWrite(pinMotor4, LOW);
    delay(2000);
    digitalWrite(pinMotor4, HIGH);

    doorStatus2 = 0;
  } else if (readSwitch2 == LOW && doorStatus2 == 0) {
    digitalWrite(pinMotor3, LOW);
    digitalWrite(pinMotor4, HIGH);
    delay(2000);
    digitalWrite(pinMotor3, HIGH);

    doorStatus2 = 1;
  }

  // Door 3
  if (readSwitch3 == HIGH && doorStatus3 == 1) {
    digitalWrite(pinMotor5, HIGH);
    digitalWrite(pinMotor6, LOW);
    delay(2000);
    digitalWrite(pinMotor6, HIGH);

    doorStatus3 = 0;
  } else if (readSwitch3 == LOW && doorStatus3 == 0) {
    digitalWrite(pinMotor5, LOW);
    digitalWrite(pinMotor6, HIGH);
    delay(2000);
    digitalWrite(pinMotor5, HIGH);

    doorStatus3 = 1;
  }

  // Door 4
  if (readSwitch4 == HIGH && doorStatus4 == 1) {
    digitalWrite(pinMotor7, HIGH);
    digitalWrite(pinMotor8, LOW);
    delay(2000);
    digitalWrite(pinMotor8, HIGH);

    doorStatus4 = 0;
  } else if (readSwitch4 == LOW && doorStatus4 == 0) {
    digitalWrite(pinMotor7, LOW);
    digitalWrite(pinMotor8, HIGH);
    delay(2000);
    digitalWrite(pinMotor7, HIGH);

    doorStatus4 = 1;
  }
}
