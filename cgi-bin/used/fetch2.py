import sys
import requests
sys.path.insert(0,'/var/www/scripts')
import mysql.connector as mysql
import json
con = mysql.connect(
    host="parakkumthalika.in",
    database="parakcyy_parakkumthalika",
    user="parakcyy_admin",
    password="Nirmal#21",
)
cur=con.cursor()



con2 = mysql.connect(
    host="parakkumthalika.in",
    database="parakcyy_routes",
    user="parakcyy_admin",
    password="Nirmal#21",
)
cur2=con2.cursor()

def getidfromname(inpstopname):

    cur.execute("select id from stops where stopname='"+inpstopname+"'")
    rows=cur.fetchall()

    if(len(rows)==0):
        return "REALLYWENTWRONG"
    else:
        return (rows[0][0])
    
def dofetch(id):



    stops=[]
    times=[]


    url="http://aanavandi.com/search/route/id/"+str(id)
    response=requests.get(url)
    response=response.content
    start=0
    end=0

    #CHECK IF NO RESULT
    if(response.find('No results found.')>10):
        print("NO RESULTS FOUND FOR ID "+str(id))
        return 0


    #stops and times
    start=response.find('<tr class="odd">')+21
    while start>5:

        end=response.find('</td>',start)
        stops+=[response[start:end]]
        start=end+9
        end=start+8
        times+=[response[start:end]]
        start=response.find('<td>',start)+4
    noofstops=len(stops)
    #heading of route
    start=response.find("<h1 class='textupper'>")+22
    end=response.find('<p>',start)
    if(start>35):
        heading=response[start:end]
    else:
        heading="unknown"

    #type of bus
    start=response.find("<b>",end)+3
    end=response.find("</b>",start)
    if(start>5):
        typeofbus=response[start:end]
    else:
        typeofbus="unknown"



    #caption (via)
    start=end+5
    end=response.find("</small>",start)
    if(start>7):
        caption=response[start:end]
    
    else:
        caption="unknown"
    if(caption.find("'")>1):
        caption="unknown route"
    stopids=[]


    #operating depot
    start=response.find("Operating")+17
    end=response.find("</div>",start)
    if(start>20):
        operatingdepot=response[start:end]
    else:
        operatingdepot="unknown"

    #stop ids
    for item in stops:
        stopids+=[getidfromname(item)]




    # print "stops:"
    # print stops
    # print "stops ids"
    # print stopids
    # print "times:"
    # print times
    # print "noofstops:"+str(noofstops)
    # print "heading:"+heading
    # print "typeofbus:"+typeofbus
    # print "caption:"+caption
    # print "operating depot:"
    # print operatingdepot



    sqlcommand=("insert into routes values('"+str(id)+"','"+"KSRTC"+"','"+str(stopids[0])+"','"+str(stopids[noofstops-1])+"','"+str(noofstops)+"','"+json.dumps(stopids)+"','"+json.dumps(times)+"','"+operatingdepot+"','"+typeofbus+"','"+caption+"');")
    print sqlcommand
    cur2.execute(sqlcommand)
for i in range(10000,20000):
    dofetch(i)



cur2.close()
con2.close()
con.close()