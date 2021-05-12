import sys
sys.path.insert(0, "/home/bitnami/htdocs/cgi-bin")
import simplejson as json
import mysql.connector as mysql


con = mysql.connect(
    host="ls-74e848ab2b3a36f7eb635c526111c0bc8e1bfdae.cpz5heb0edxj.ap-south-1.rds.amazonaws.com",
    database="connects",
    user="dbmasteruser",
    password="Mrrw-hesQ+A`Xb?(u:B6,7Tme;C%rge_",
)

cur=con.cursor()
i=1



command = "select pathid, routeid from c1002"
cur.execute(command)
res = cur.fetchall()

for(i in range(1,10)):
    

for item in (res):
    print(item[0])
    print(item[1])
    com2="select * from routes where id = "+str(item[1])
    cur.execute(com2)
    res2=cur.fetchall()
    destin=(res2[0][3])
    times=(res2[0][6])
    timesjson=json.loads(times)
    lasttime=timesjson[len(timesjson)-1]
    pathid=item[0]
    print("pathd:"+str(pathid))
    print("dest:"+str(destin))
    print("lasttime:"+str(lasttime))
    updatecom="update  c1002 set finalstop='"+str(destin)+"' , finaltime = '"+str(lasttime)+"' where pathid = '"+str(pathid)+"';"
    cur.execute(updatecom)
# 
#     #checking
#     checkcommand = 
#     print(i)
#     command="""

    
#     ALTER TABLE `c"""+str(i)+"""` ADD `finalstop` INT NOT NULL DEFAULT '0' AFTER `reachtime`;"""

#     cur.execute(command)


cur.close()
con.close()








#OLD



import sys
sys.path.insert(0, "/home/bitnami/htdocs/cgi-bin")
import simplejson as json
import mysql.connector as mysql


con = mysql.connect(
    host="ls-74e848ab2b3a36f7eb635c526111c0bc8e1bfdae.cpz5heb0edxj.ap-south-1.rds.amazonaws.com",
    database="connects",
    user="dbmasteruser",
    password="Mrrw-hesQ+A`Xb?(u:B6,7Tme;C%rge_",
)

cur=con.cursor()
i=1
for i in range(10,4999):
    print(i)
    command = """SELECT count(table_name)
                FROM INFORMATION_SCHEMA.TABLES
            WHERE table_schema = 'connects'
                AND table_name LIKE 'c"""+str(i)+"""'
                """
                
    cur.execute(command)
    if(cur.fetchall()[0][0]>0):
        command1="""ALTER TABLE `c"""+str(i)+"""` ADD `finaltime` TIME NOT NULL AFTER `finalstop`;"""
        cur.execute(command1)
        print(cur.fetchall)
# 
#     #checking
#     checkcommand = 
#     print(i)
#     command="""

    
#     ALTER TABLE `c"""+str(i)+"""` ADD `finalstop` INT NOT NULL DEFAULT '0' AFTER `reachtime`;"""

#     cur.execute(command)


cur.close()
con.close()
