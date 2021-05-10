#!/usr/bin/env python2.7
import sys
sys.path.insert(0, "/home/bitnami/htdocs/cgi-bin")
import simplejson as json
import mysql.connector as mysql

def filltyping(starting):
    con = mysql.connect(
        host="ls-74e848ab2b3a36f7eb635c526111c0bc8e1bfdae.cpz5heb0edxj.ap-south-1.rds.amazonaws.com",
        database="parakkumthalika",
        user="dbmasteruser",
        password="Mrrw-hesQ+A`Xb?(u:B6,7Tme;C%rge_",
    )
    cur=con.cursor()
    response=[]
    origin = starting
    cur.execute("select id,stopname from stops where stopname like '"+origin.upper()+"%' order by id limit 10")
    #print("COMMAND IS: "+"select stopname from stops where stopname like '"+origin.upper()+"%'  order by id limit 10")
    rows=cur.fetchall()
    for r in rows:
        response.append({'stopname':r[1],'id':r[0]})
    return json.dumps(response)
    cur.close()
    con.close()
