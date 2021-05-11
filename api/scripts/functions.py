#Converts HH:MM:SS to seconds
def get_sec(time_str):
    """Get Seconds from time."""
    h, m, s = time_str.split(':')
    return int(h) * 3600 + int(m) * 60 + int(s)


#Converts HHMMSS to seconds
def no_colons_to_sec(colonless):
    if(len(colonless)==6):
        h=colonless[0:2]
        m=colonless[2:4]
        s=colonless[4:6]
        return int(h)*3600+int(m)*60+int(s)
    elif(len(colonless)==5):
        h=colonless[0:1]
        m=colonless[1:2]
        s=colonless[3:2]
        return int(h) * 3600 + int(m) * 60 + int(s)
    else:
        print("INVALID")

def hhmmss_to_hhmmam(hms):
    if(len(hms)<8):
        hms="0"+hms
    hh=hms[0:2]
    mm=hms[3:5]
    if(int(hh)>12):
        hh=str(int(hh)-12)
        return(hh+":"+mm+" PM")
    else:
        return(hh+":"+mm+" AM")