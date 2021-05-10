#!/usr/bin/python
import sys
sys.path.insert(0, "/home/bitnami/htdocs/cgi-bin")




from funfilltyping import *
from fungetnamefromid import *

reqtype = sys.argv[1]
if(reqtype=="typing"):
    starting=sys.argv[2]
    print(filltyping(starting))
    #print("YESS"+starting)
elif(reqtype=="getnamefromid"):
    inpval=sys.argv[2]
    print(getnamefromid(inpval))
elif(reqtype=="getidfromname"):
    inpstopname=sys.argv[2]
    print(getidfromname(inpstopname))
else:
    print("UNKNOWN TYPE OF REQ is"+str(reqtype))

