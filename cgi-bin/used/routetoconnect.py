import mysql.connector as mysql
import json
con1=mysql.connect(
    host="parakkumthalika.in" ,
    user="parakcyy_admin",
    password="Nirmal#21" ,
    database="parakcyy_routes"
)
cur1=con1.cursor()

con2=mysql.connect(
    host="parakkumthalika.in" ,
    user="parakcyy_admin",
    password="Nirmal#21",
    database="parakcyy_connects"
)
cur2=con2.cursor()


cur1.execute("select * from routes where id>40000 and id<50000 order by id")
resultall=cur1.fetchall()
for item in resultall:
    routeid=item[0]
    origin=item[2]
    count=int(item[4])
    stops=json.loads(item[5])
    print "stops are:"
    print stops
    times=json.loads(item[6])
    for i in range(0,count-1):
        for j in range(i+1,count):
  
            command=("insert into c"+str(stops[i])+" (target,time,routeid,reachtime) values ("+str(stops[j])+", '"+str(times[i])+"', "+str(item[0])+", '"+str(times[j])+"');")
            cur2.execute(command)
            print command

cur2.close()
con2.close()
cur1.close()
con1.close()
