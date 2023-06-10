n = int(input())
x = []
	
for i in range(n):

    x.append(int(input()))
    
    if x[i] == 0:
        v = 0
        
        while i >= 0:
            if x[i] != 0:
                x[i] = 0
                i += v
                break
            else:
                i -= 1
                v += 1

print(sum(x))
