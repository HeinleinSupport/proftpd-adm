#!/bin/bash
echo "Welcome to the delete-user-script"
USER=$1
USER_ID=$2
GROUP_ID=$3
HOMEDIR=$4
EMAIL=$5

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

query="from usertable where homedir like '$HOMEDIR/%';"

mysql -e "select userid, homedir $query" proftpd_admin

# mysql -e "$query"

# rm -rfv $HOMEDIR

