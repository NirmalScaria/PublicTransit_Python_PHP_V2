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
closerids=[]
cur=con.cursor()
response=[]
command = "select id from stops order by abs("+gx+'-lat)+abs('+gy+'-lng) asc limit 10'
cur.execute(command)
rows=cur.fetchall()

for i in range(len(rows)):

    closerids.append(rows[i][0])

print(closerids)
#print(djson)


#print(rows[0][1])
for r in rows:
    response.append(r)
# for item in response:
#     print(item)
cur.close()
con.close()