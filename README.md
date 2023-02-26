Nel folder Apache ci sono i sorgenti per far partire il server composto da 2 container docker contenenti:
- il server apache con wordpress
- il server mysql 

Il container mysql ha un volume apache_mysql-data-wordpress nel quale sono presenti i file mysql.
Se si vuole ripristinare un vecchio bakcup basta utilizzare il comando sotto per montare il volume

docker run -d --name devtest --mount source=apache_mysql-data-wordpress,target=/app nginx:latest

copiare i file all'interno del volume 
spegnere il container e far partire i container apache e mysql