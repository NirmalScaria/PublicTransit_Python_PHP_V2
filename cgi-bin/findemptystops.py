#!/usr/bin/python
import sys
sys.path.insert(0, "/home/bitnami/htdocs/cgi-bin")
sys.path.insert(0,'/var/www/scripts')
import mysql.connector as mysql
con = mysql.connect(
    database="parakkumthalika",
host="ls-74e848ab2b3a36f7eb635c526111c0bc8e1bfdae.cpz5heb0edxj.ap-south-1.rds.amazonaws.com",
        user="dbmasteruser",
        password="Mrrw-hesQ+A`Xb?(u:B6,7Tme;C%rge_",
)
cur=con.cursor()

con2 = mysql.connect(
    database="connects",
host="ls-74e848ab2b3a36f7eb635c526111c0bc8e1bfdae.cpz5heb0edxj.ap-south-1.rds.amazonaws.com",
        user="dbmasteruser",
        password="Mrrw-hesQ+A`Xb?(u:B6,7Tme;C%rge_",
)
cur2=con2.cursor()
empty=[]
cur.execute("select id from stops")
res=cur.fetchall()
for item in res:
    #print item[0]
    cur2.execute("select pathid from c"+str(item[0])+";")
    fetched=cur2.fetchall()
    print len(fetched)
    if(len(fetched)==0):
        empty+=[str(item[0])]
print "Empty places are:"
print empty
cur.close()
con.close()