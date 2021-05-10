import sys
sys.path.insert(0, "/home/bitnami/htdocs/cgi-bin")
import simplejson as json
import mysql.connector as mysql

def filltyping():
    con = mysql.connect(
        host="ls-74e848ab2b3a36f7eb635c526111c0bc8e1bfdae.cpz5heb0edxj.ap-south-1.rds.amazonaws.com",
        database="parakkumthalika",
        user="dbmasteruser",
        password="Mrrw-hesQ+A`Xb?(u:B6,7Tme;C%rge_",
    )
    cur=con.cursor()
    response=[]
    cur.execute("select * from stops")
    #print("COMMAND IS: "+"select stopname from stops where stopname like '"+origin.upper()+"%'  order by id limit 10")
    rows=cur.fetchall()
    for r in rows:
        response.append(r)
    outt="["
    for item in response:
        outt+="'"
        outt+=str(list(item)[0])
        outt+="', "
    return (response[1])
    cur.close()
    con.close()
print(filltyping())