module.exports = (sequelize, DataTypes) => {
  const User = sequelize.define(
    "User",
    {
      id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        primaryKey: true,
        allowNUll: false,
      },
      name: {
        type: DataTypes.STRING,
        allowNUll: false,
      },
      avatar: {
        type: DataTypes.STRING,
        allowNUll: false,
      },
      email: {
        type: DataTypes.STRING,
        allowNUll: false,
      },
      password: {
        type: DataTypes.STRING,
        allowNUll: false,
      },
      admin: {
        type: DataTypes.BOOLEAN,
        allowNUll: false,
      },
      createdAt: {
        type: DataTypes.DATE,
        field: "created_at",
        allowNUll: false,
      },
      updatedAt: {
        type: DataTypes.DATE,
        field: "updated_at",
        allowNUll: false,
      },
    },
    {
      tableName: "users",
      timestamps: true,
    }
  );
  return User;
};
