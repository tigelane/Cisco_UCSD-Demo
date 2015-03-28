#!/usr/bin/env python
import requests, json, sys

if (len(sys.argv) < 9):
	print "Incorect usage: %s OS user servername vcpu memory timetolive hippa pci" %(sys.argv[0])
	sys.exit()
	
os = sys.argv[1]
user = sys.argv[2]
vcpu = sys.argv[4]
memory = sys.argv[5]
timetolive = sys.argv[6]
hippa = sys.argv[7]
pci = sys.argv[8]

# User: engineer
eng_key = {'X-Cloupia-Request-Key' : 'CB17921D19634FCCA08DEA7BDEA55111'}
eng_vdc = "vDC_Engineering"

# User: nurse
nurse_key = {'X-Cloupia-Request-Key' : 'AC00C222E3684420A2A09B8529C41F7B'}
nurse_vdc = "vDC_Nurse"

	
def create_catalog(os, vcpu, memory, timetolive, hippa, pci):
	if (os == "windows"):
		catalog_name_os = "windows"
	if (os == "linux"):
		catalog_name_os = "ubuntu"

	# Low CPU goes to AWS
	if (int(vcpu) == 1):
		catalog_name_dc = "aws"
		# print "in aws"
	else:
		catalog_name_dc = "cp"

	# Lower memory goes to AWS
	if (int(memory) <= 2048 and catalog_name_dc == "aws"):
		catalog_name_dc = "aws"
		# print "in aws"
	else:
		catalog_name_dc = "cp"

	# Shorter than 60 goes to AWS, shorter than 120 goes to a Cisco Powered DC
	if (int(timetolive) <= 30 and catalog_name_dc == "aws"):
		catalog_name_dc = "aws"
		# print "in aws"
	elif int(timetolive) < 180:
		catalog_name_dc = "cp"
	else:
		catalog_name_dc = "internal"

	# If we need hippa or pci, it's going to be internal
	if ((int(hippa) == 1) or (int(pci) == 1)):
		catalog_name_dc = "internal"

	return catalog_name_os + "_" + catalog_name_dc

catalog_name = create_catalog(os, vcpu, memory, timetolive, hippa, pci)

if (user == "engineer") :
	main_url = 'http://phx2-lab-dcv-ucs-cloupiajtrii.cisco.com/app/api/rest?formatType=json&opName=userAPISubmitServiceRequestCustom&opData={'
	main_url += 'param0:"%s",' %(catalog_name)
	main_url += 'param1:"%s",' %(eng_vdc)
	for option in range(2,6):
		main_url += 'param%s:"%s",' %(option, sys.argv[option+1])
	main_url += 'param6:"1",param7:"1",param8:"Test - Please delete any time you need to."}'
	security_key = eng_key

if (user == "nurse") :
	#print "It's a NURSE!"
	# Standard request
	main_url = 'http://phx2-lab-dcv-ucs-cloupiajtrii.cisco.com/app/api/rest?formatType=json&opName=userAPISubmitServiceRequest&opData={param0:"'
	main_url += 'param0:"%s",' %(catalog_name)
	main_url += 'param1:"%s",' %(nurse_vdc)
	main_url += 'param2:"1",param3:"1.0",param4:"1.0",param5:"Test - Please delete any time."}'
	security_key = nurse_key

try:
	# print "Catalog Name: " + catalog_name
	# print main_url
	result = requests.post(main_url, headers=security_key)
	json_text = result.text
	decoded_json = json.loads(json_text)

	print "<P>"
	print '<TABLE  align="center" bgcolor="#FFFFFF" border="2" BORDERCOLOR="#990033"> <TR><TH>Service Request Accepted'
	#	print '<TD><font color="#990033">'
	print '<TR align="center"> <TD> <font color="#990033">'
	print 'Service request number: '
	print '<font color="#333333">', decoded_json['serviceResult']
	print '<TR align="center"> <TD> <font color="#990033">'
	print 'Catalog item requested: '
	print '<font color="#333333">', catalog_name
	print '<TR align="center" > <TD> <font color="#990033">'
	print "You will recieve and e-mail with login instructions when your server is ready."

except (ValueError, KeyError, TypeError):
	print "<P>"
	print '<TABLE  align="center" bgcolor="#FFFFFF" border="2" BORDERCOLOR="#990033"> <TR><TH>Service Request Error'
	print '<TD> <font color="#990033">'
	print '<TR align="center" ><TD>'
	print "I'm sorry, there was an error."
