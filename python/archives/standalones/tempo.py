
a = {
    "New York": 8550405, 
    "Los Angeles": 3971883, 
    "Toronto": 2731571, 
    "Chicago": 2720546, 
    "Houston": 2296224, 
    "Montreal": 1704694, 
    "Calgary": 1239220, 
    "Vancouver": 631486, 
    "Boston": 667137
    }

n = int(input())
am = []

for i in range(n):
    x = input()

    if x[:1] in "R":
        am.append(x[1:])

print(am)