from numpy.linalg import solve

a = [[1, 1, 1], [1, 2, 2], [2, 1, 3]]
b = [6, 9, 11]

print (solve(a, b))