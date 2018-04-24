#!/usr/local/pkg/python/3.5/bin/python3

from twython import Twython, TwythonError

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

try:
    search_results = api.search(q='#KnowledgeKitchen', count=50)
    
    for post in search_results['statuses']:
        #each post is a dictionary
    
        #print out a select few values from the dicitonary of this post
        print('Tweet from {user} on date: {date}:\n{text}'.format(
            user = post['user']['screen_name'], 
            date = post['created_at'],
            text = post['text']
        ))
except TwythonError:
    print('Unable to connect to the Twitter API')
