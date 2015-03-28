#!/usr/bin/env python
import HTML, json

config_file = "asu_config.json"

table_data = [
        ['Last name',   'First name',   'Age'],
        ['Smith',       'John',         30],
        ['Carpenter',   'Jack',         47],
        ['Johnson',     'Paul',         62],
    ]
htmlcode = HTML.table(table_data)
print htmlcode

print "\n\n\n"

config = json.loads(open(config_file).read())
print config

# print config['actions']['action5']

# print config['user'][0]

print "\n\n"
name = "nurse"

try:
	print config['users'][name]['background_picture']
	print '\n'
	print config['users']['system']
except():
	print "Nope, didn't work"
	exit()