import sys
sys.path.insert(0, "/home/bitnami/htdocs/cgi-bin")
import simplejson as json
import mysql.connector as mysql
gx = sys.argv[1]
gy = sys.argv[2]
con = mysql.connect(
    host="ls-74e848ab2b3a36f7eb635c526111c0bc8e1bfdae.cpz5heb0edxj.ap-south-1.rds.amazonaws.com",
    database="parakkumthalika",
    user="dbmasteruser",
    password="Mrrw-hesQ+A`Xb?(u:B6,7Tme;C%rge_",
)
con1 = mysql.connect(
    host="ls-74e848ab2b3a36f7eb635c526111c0bc8e1bfdae.cpz5heb0edxj.ap-south-1.rds.amazonaws.com",
    database="log",
    user="dbmasteruser",
    password="Mrrw-hesQ+A`Xb?(u:B6,7Tme;C%rge_",
)
cur=con.cursor()
cur1=con1.cursor()
response=[]
command = "select * from stops order by abs("+gx+'-lat)+abs('+gy+'-lng) asc limit 10'

cur.execute(command)

rows=cur.fetchall()
command1= "insert into deviceloc values(0,"+gx+", "+gy+', CURRENT_TIME(), "'+rows[0][1]+'","'+rows[0][2]+'");'
#print(command1)
cur1.execute(command1)
con1.commit()
print(rows[0][1])
for r in rows:
    response.append(r)
# for item in response:
#     print(item)
cur.close()
cur1.close()
con1.close()
con.close()