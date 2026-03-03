#!/bin/bash

# Recebe o nome como argumento
nome="$1"

# Validação
if [ -z "$nome" ]; then
  echo "Erro: informe o nome do layout."
  echo "Uso: bash create-layout.sh nome-do-layout"
  exit 1
fi

# Primeira letra maiúscula
Nome=$(echo "$nome" | sed 's/.*/\u&/')

# Criar estrutura de pastas
mkdir -p "${nome}-layout/assets/html"
mkdir -p "${nome}-layout/assets/css"
mkdir -p "${nome}-layout/configuration"
mkdir -p "${nome}-layout/widget"

# Criar arquivos HTML e CSS vazios
touch "${nome}-layout/assets/html/ipseity-${nome}.html"
touch "${nome}-layout/assets/css/ipseity-${nome}.css"

# Copiar e substituir Configuration
sed "s/Example/$Nome/g; s/example/$nome/g" home/model/example-layout/configuration/IpseityForgeExampleConfiguration.php > "${nome}-layout/configuration/IpseityForge${Nome}Configuration.php"

# Copiar e substituir Widget
sed "s/Example/$Nome/g; s/example/$nome/g" home/model/example-layout/widget/IpseityForgeExampleWidget.php > "${nome}-layout/widget/IpseityForge${Nome}Widget.php"

# Copiar e substituir index.php
sed "s/Example/$Nome/g; s/example/$nome/g" home/model/example-layout/index.php > "${nome}-layout/index.php"

# Verificação final
if [ $? -eq 0 ]; then
    echo "Sucesso: Layout '${nome}' criado com sucesso."
else
    echo "Erro: Falha ao criar layout."
    exit 1
fi