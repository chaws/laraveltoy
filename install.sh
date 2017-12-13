!#/bin/bash

# Instalacao de dependencias para este projeto

GOAHEAD=false
if [ -f /etc/os-release ]
then
  . /etc/os-release
  if [ "$ID"  "debian" && $VERSION_ID >= 9 ]
fi
