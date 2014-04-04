#!/bin/bash
echo "Welcome to the create-user-script"
USER=$1
USER_ID=$2
GROUP_ID=$3

mkdir -p /ftp/$USER
chown $USER_ID.$GROUP_ID /ftp/$USER
