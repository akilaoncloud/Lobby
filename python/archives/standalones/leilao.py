n = int(input())
lances = {}

for i in range(n):
    c = input()
    v = int(input())
    lances[v] = c


lr = dict(reversed(list(lances.items())))
print(lr)
print(max(lr))
print(lr[max(lr)])