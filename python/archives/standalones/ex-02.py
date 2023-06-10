apc = ["chvs","nbld","enslrd"]
umd = ["elvd","nrml"]
vnt = ["frc","frt"]

s_apc = int(input("Como está o céu? | [0] Chuvoso | [1] Nublado | [2] Ensolarado | -> "))

if apc[s_apc] == "chvs":
    print("Não soltar Pipa")


if apc[s_apc] == "nbld":

    s_umd = int(input("Como está a Umidade? | [0] Elevada | [1] Normal | -> "))

    if umd[s_umd] == "elvd":
        print("Não soltar Pipa")

    else:
        print("Soltar Pipa")


if apc[s_apc] == "enslrd":
    
    s_vnt = int(input("Como está o Vento? | [0] Fraco | [1] Forte | -> "))

    if vnt[s_vnt] == "frc":
        print("Não soltar Pipa")

    else:
        print("Soltar Pipa")