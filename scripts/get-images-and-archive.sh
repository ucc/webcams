#!/bin/zsh
# Get all images
#for i in 1 2 3 4; do
  /home/other/webcam/webcam-grab "http://ipcamera1/image.jpg" "ipcamera1" "Clubroom_SW"
  /home/other/webcam/webcam-grab "http://ipcamera2/image.jpg" "ipcamera2" "Machine_Room_SW"
  /home/other/webcam/webcam-grab "http://ipcamera3/image.jpg" "ipcamera3" "Clubroom_SE"
  /home/other/webcam/webcam-grab "http://ipcamera4/image.jpg" "ipcamera4" "Machine_Room_SE"
  /home/other/webcam/webcam-grab "http://ipcamera5/image.jpg" "ipcamera5" "Clubroom_N"
  /home/other/webcam/webcam-grab "http://ipcamera6/image.jpg" "ipcamera6" "UniGames"
  /home/other/webcam/webcam-grab "http://ipcamera7/snapshot.cgi" "ipcamera7" "Machine Room"
  #/home/other/webcam/webcam-grab "http://ipcamera3/image.jpg" "webcam1" "Clubroom_SE"
  #/home/other/webcam/camwhore-grab Machine_Room_SW.jpg bw-webcam
  #/home/other/webcam/camwhore-grab Machine_Room_SE.jpg webcam3
  #/home/other/webcam/camwhore-grab USB_Cam.jpg uvc1
  #/home/other/webcam/camwhore-grab Clubroom_SW.jpg webcam
#  if [[ "$i" -eq "1" ]]; then
#    # Copy images as necessary
#    /services/webcam/archive-script.sh
#  fi
  #echo "sleeping"
  #sleep 10
#done
#   /services/webcam/archive-script.sh
