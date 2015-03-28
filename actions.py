#!/usr/bin/env python
import requests, json, sys

security_key = vdc = eng_key = human_key = nurse_key = decoded_json = ""

def check_usage():
	if (len(sys.argv) < 3):
		print "Incorect usage: %s group action[GetRequests, GetCatalogs] (option)" %(sys.argv[0])
		sys.exit()

def user_setup():
	global security_key, vdc
	
	# Setup the security key
	if (group == "Engineering") :
		security_key = {'X-Cloupia-Request-Key' : 'CB17921D19634FCCA08DEA7BDEA55111'}
		vdc = "Engineering"
	elif (group == "Humanities") :
		security_key = {'X-Cloupia-Request-Key' : 'AC00C222E3684420A2A09B8529C41F7B'}
		vdc = "Humanities"
	elif (group == "Nursing") :
		security_key = {'X-Cloupia-Request-Key' : 'AC00C222E3684420A2A09B8529C41F7B'}
		vdc = "Nurse"
	elif (group == "PHX-DCV-LAB") :
		security_key = {'X-Cloupia-Request-Key' : 'C556BCDA1AEA4849B3373FF6C025E97F'}
		vdc = "PHX-DCV-LAB"
	else:
		show_error("Request Error", "Invalid group name")

def show_error(error_title,error_message):
	print "<P>"
	print '<TABLE  align="center" bgcolor="#FFFFFF" border="2" BORDERCOLOR="#990033">'
	print "<TR><TH>"
	print error_title
	print '<TD> <font color="#990033">'
	print '<TR align="center" ><TD>'
	print error_message
	sys.exit()

check_usage()
group = sys.argv[1]
action = sys.argv[2]
user_setup()


# Execute the proper action item
if (action == "GetRequests"):
	main_url = 'http://phx2-lab-dcv-ucs-cloupiajtrii.cisco.com/app/api/rest?formatType=json&opName=userAPIGetServiceRequests&opData={}'
elif (action == "GetCatalogs"):
	main_url = 'http://phx2-lab-dcv-ucs-cloupiajtrii.cisco.com/app/api/rest?formatType=json&opName=userAPIGetCatalogsPerGroup&opData={'
	main_url += 'param0:"%s"' %(group)
	main_url += '}'

if (action == "GetRequests"):
	try:
		# print security_key
		# print main_url
		result = requests.post(main_url, headers=security_key)
		json_text = result.text
		decoded_json = json.loads(json_text)
		items = len(decoded_json['serviceResult']['rows'])

		print "<P>"
		print '<TABLE  align="center" bgcolor="#FFFFFF" border="2" BORDERCOLOR="#990033"> <TR><TH>Action Sucessfull'
		print '</table>'
		print '<TABLE  align="center" bgcolor="#FFFFFF" border="2" BORDERCOLOR="#990033">'		
		print '<TR align="center"> <TD> <font color="#990033">'
		print "Current Service Requests for %s" %(group)
		print "<TR><TH>Request Number<TH>Requested Template</TD></TH>"
		print '<TR align="center" > <TD> <font color="#990033">'	
		for i in range(0,items):
			if (decoded_json['serviceResult']['rows'][i]['Group'] == group):
				print "<TR><TD>"
				print decoded_json['serviceResult']['rows'][i]['Service_Request_ID']
				print "<TD>"
				print decoded_json['serviceResult']['rows'][i]['Catalog_Workflow_Name']
		print "</table>"

	except (ValueError, KeyError, TypeError):
		show_error("Request Error", "Problem with requests encountered")

if (action == "GetCatalogs"):
	try:
		# print security_key
		# print main_url
		result = requests.post(main_url, headers=security_key)
		json_text = result.text
		decoded_json = json.loads(json_text)
		items = len(decoded_json['serviceResult']['rows'])

		print "<P>"
		print '<TABLE  align="center" bgcolor="#FFFFFF" border="2" BORDERCOLOR="#990033"> <TR><TH>Action Sucessfull'
		print '</table>'
		print '<TABLE  align="center" bgcolor="#FFFFFF" border="2" BORDERCOLOR="#990033">'		
		print '<TR align="center"> <TD> <font color="#990033">'
		print "Catalog Items Available"
		print '<TR align="center" > <TD> <font color="#990033">'	
		for i in range(0,items):
			print "<TR><TD>"
			print decoded_json['serviceResult']['rows'][i]['Catalog_Name']
		print "</table>"

	except (ValueError, KeyError, TypeError):
		show_error("Request Error", "Problem with requests encountered")
