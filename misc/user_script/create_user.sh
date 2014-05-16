#!/bin/bash
echo "Welcome to the create-user-script"
USER=$1
USER_ID=$2
GROUP_ID=$3
HOMEDIR=$4
EMAIL=$5

GROUP_INTERNAL=$6
GROUP_EXTERNAL=$7

echo "Userdata:"
echo -e "\tUsername:\t" $USER
echo -e "\tUser ID:\t" 	$USER_ID
echo -e "\tGroup ID:\t" $GROUP_ID
echo -e "\tHomedirectory:\t" $HOMEDIR
echo -e "\tE-mail:\t\t" $EMAIL


echo -e "\nParams: "
n=0
for i in $*; do
	echo -e "\t$n : $i"
	let n+=1
done

mkdir -pv $HOMEDIR

# External Users have Incoming and Outgoing subdirs
if [ "$GROUP_ID" -eq "$GROUP_EXTERNAL" ]; then
  mkdir -pv $HOMEDIR/Incoming
  chmod -c 02570 $HOMEDIR/Incoming
  mkdir -pv $HOMEDIR/Outgoing
  chmod -c 02770 $HOMEDIR/Outgoing
  chmod -c 02570 $HOMEDIR
else
  chmod -c 02771 $HOMEDIR
fi

# All directories are set with internal group
chown -Rc $USER_ID $HOMEDIR
chgrp -Rc $GROUP_INTERNAL $HOMEDIR

