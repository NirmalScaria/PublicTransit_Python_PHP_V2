#!/usr/bin/env python2.7
import sys
sys.path.insert(0, "/home/bitnami/htdocs/cgi-bin")
import simplejson as json
import mysql.connector as mysql


def getnamefromid(inpid):
    
    con = mysql.connect(
        host="ls-74e848ab2b3a36f7eb635c526111c0bc8e1bfdae.cpz5heb0edxj.ap-south-1.rds.amazonaws.com",
        user="dbmasteruser",
        password="Mrrw-hesQ+A`Xb?(u:B6,7Tme;C%rge_",
        database="parakkumthalika",
    )
    cur=con.cursor()
    response=[]
    cur.execute("select stopname from stops where id="+inpid)
    #print("COMMAND IS: "+"select stopname from stops where stopname like '"+origin.upper()+"%'  order by id limit 10")
    rows=cur.fetchall()
    namee=rows[0][0]
    if(namee.find("(")>-1):
        namee=(namee[:namee.find("(")-1])
    if(len(rows)==0):
        return "REALLYWENTWRONG"
    else:
        return namee.title()

    cur.close()
    con.close()



def getidfromname(inpstopname):
    con = mysql.connect(
        host="ls-74e848ab2b3a36f7eb635c526111c0bc8e1bfdae.cpz5heb0edxj.ap-south-1.rds.amazonaws.com",
        user="dbmasteruser",
        password="Mrrw-hesQ+A`Xb?(u:B6,7Tme;C%rge_",
        database="parakkumthalika",
    )
    cur=con.cursor()
    response=[]
    cur.execute("select id from stops where stopname='"+inpstopname+"'")
    #print("COMMAND IS: "+"select stopname from stops where stopname like '"+origin.upper()+"%'  order by id limit 10")
    rows=cur.fetchall()
    if(len(rows)==0):
        return "REALLYWENTWRONG"
    else:
        return (rows[0][0])

    cur.close()
    con.close()

