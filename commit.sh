git add .
git status
echo press invio to continue...
read
nomeCommit=`date "+%Y %m %d %H:%M"`
nomeCommit="aggiornamento "$nomeCommit
git commit -m "$nomeCommit"
read
clear
git push
read
clear