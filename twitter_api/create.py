#!/usr/local/pkg/python/3.5/bin/python3

from twython import Twython

# Twitter application authentication
# You get these credentials by registering your app with Twitter
#CONSUMER API KEY & SECRET
API_KEY = 'pr3Zp1Q4AtcviX7vHYMcxzPPW'
API_SECRET = '6DSISk5T91GCGrspfQneuW2KHn1RRk2pG7CSV0XlWse6hg3wg9'
#ACCESS TOKEN & SECRET
OAUTH_TOKEN = '3227557446-KHSKVaOsaxkRLimhBV5WLceDJeBgTKMpzkvrBgF'
OAUTH_TOKEN_SECRET = '7DPDGWzqOG6Rq6FDqHioJzjkPXqKxcQ3x1KHTGhBkg4ZO'

# connect to the TWitter API using your app's credentials
api = Twython(API_KEY,API_SECRET,OAUTH_TOKEN,OAUTH_TOKEN_SECRET)

api.update_status(status= "#KnowledgeKitchen I <3 Database Design!")

