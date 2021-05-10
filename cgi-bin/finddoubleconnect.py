#search for second degree connect


#!/usr/bin/python
import sys
sys.path.insert(0, "/home/bitnami/htdocs/cgi-bin")
sys.path.insert(0,'/var/www/scripts')
import mysql.connector as mysql
from datetime import date, datetime
import json
def json_serial(obj):
    """JSON serializer for objects not serializable by default json code"""

    if isinstance(obj, (datetime, date)):
        return obj.isoformat()
    else:
        return(str(obj))


def finddoubleconnect(origin,dest,starttime,startlagmax,minlayover,maxlayover,numberofresults):
#finddoubleconnect(55,666,"09:10:15",18000,120,18000,25)
    con = mysql.connect(
        database="connects",
host="ls-74e848ab2b3a36f7eb635c526111c0bc8e1bfdae.cpz5heb0edxj.ap-south-1.rds.amazonaws.com",
        user="dbmasteruser",
        password="Mrrw-hesQ+A`Xb?(u:B6,7Tme;C%rge_",
    )
    cur=con.cursor()


    #-------------Define the parameters----------------
    origin=str(origin)
    dest=str(dest)
    starttime=str(starttime)
    startlagmax=str(startlagmax)
    minlayover=str(minlayover)
    maxlayover=str(maxlayover)
    numberofresults=str(numberofresults)


    #--------------Create the command-------------------

    command = """select thefirst.*,thesecond.*,if(TIME_TO_SEC(thefirst.time)>=TIME_TO_SEC('"""+starttime+"""'),TIME_TO_SEC(thefirst.time)-TIME_TO_SEC('"""+starttime+"""'),TIME_TO_SEC(thefirst.time)+86400-TIME_TO_SEC('"""+starttime+"""')) 
    +
    if(TIME_TO_SEC(thefirst.reachtime)>=TIME_TO_SEC(thefirst.time),TIME_TO_SEC(thefirst.reachtime)-TIME_TO_SEC(thefirst.time),TIME_TO_SEC(thefirst.reachtime)+86400-TIME_TO_SEC(thefirst.time)) 
    +
    if(TIME_TO_SEC(thesecond.starttime)>=TIME_TO_SEC(thefirst.reachtime),TIME_TO_SEC(thesecond.starttime)-TIME_TO_SEC(thefirst.reachtime),TIME_TO_SEC(thesecond.starttime)+86400-TIME_TO_SEC(thefirst.reachtime)) 
    +
    if(TIME_TO_SEC(thesecond.reachtime)>=TIME_TO_SEC(thesecond.starttime),TIME_TO_SEC(thesecond.reachtime)-TIME_TO_SEC(thesecond.starttime),TIME_TO_SEC(thesecond.reachtime)+86400-TIME_TO_SEC(thesecond.starttime)) 
    as 
    totaltime
    from c"""+(origin)+""" as thefirst                      /*The origin*/   
        join r"""+(dest)+"""  as thesecond on           /* The target*/
            thefirst.target=thesecond.origin and          /*connect point must be same */
            (TIME_TO_SEC(thesecond.starttime)-TIME_TO_SEC(thefirst.reachtime) between """+minlayover+""" and """+maxlayover+""" or      /*layover time limits second*/
            TIME_TO_SEC(thesecond.starttime)+86400-TIME_TO_SEC(thefirst.reachtime) between """+minlayover+""" and """+maxlayover+""")and      /*midnight layover modification */
            (TIME_TO_SEC(thefirst.time) between TIME_TO_SEC('"""+starttime+"""') and TIME_TO_SEC('"""+starttime+"""')+"""+startlagmax+""" or       /*first start in given time*/
            TIME_TO_SEC(thefirst.time)+86400 between TIME_TO_SEC('"""+starttime+"""') and TIME_TO_SEC('"""+starttime+"""')+"""+startlagmax+""")       /*first start midnight modification*/
    group by thesecond.routeid                                  /*filter for redundancy*/
    order by totaltime
    limit """+numberofresults+""";"""




    #--------------execute the command
    cur.execute(command)
    res=cur.fetchall()
    resjson=json.dumps(res,default=json_serial)
    return resjson

    cur.close()
    con.close()