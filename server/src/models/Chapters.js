module.exports = (sequelize, DataTypes) => {
  const Chapters = sequelize.define(
    "Chapters",
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
      courses_id: {
        type: DataTypes.INTEGER,
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
      tableName: "chapters",
      timestamps: true,
    }
  );
  return Chapters;
};
